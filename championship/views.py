import json
import random
from datetime import datetime
from pathlib import Path

from django.conf import settings
from django.core.mail import EmailMessage, send_mail
from django.http import JsonResponse
from django.shortcuts import render
from django.utils.html import escape
from django.views.decorators.csrf import csrf_exempt
from django.views.decorators.http import require_POST

from .data import (
    COMMITTEE,
    COMPETENCY_DETAILS,
    CONTACTS,
    DOCUMENT_SUBTITLES,
    DOCUMENT_TITLES,
    DOCUMENTS,
    EMAIL,
    ORGANIZER,
    SITE,
    get_competencies,
)


ALLOWED_EXTENSIONS = {"pdf", "doc", "docx", "jpg", "jpeg", "png"}
MAX_FILE_SIZE = 5 * 1024 * 1024


def base_context(request, current_page):
    return {
        "site": {**SITE, "url": request.build_absolute_uri("/")[:-1]},
        "contacts": {**CONTACTS, "phone_tel": "".join(ch for ch in CONTACTS["phone"] if ch.isdigit() or ch == "+")},
        "organizer": ORGANIZER,
        "committee": COMMITTEE,
        "competencies": get_competencies(),
        "current_page": current_page,
    }


def index(request):
    return render(request, "championship/index.html", base_context(request, "index.php"))


def about(request):
    return render(request, "championship/about.html", base_context(request, "about.php"))


def competencies(request):
    context = base_context(request, "competencies.php")
    context["competency_details"] = COMPETENCY_DETAILS
    return render(request, "championship/competencies.html", context)


def documents(request):
    context = base_context(request, "documents.php")
    context.update(
        {
            "documents": DOCUMENTS,
            "document_titles": DOCUMENT_TITLES,
            "document_subtitles": DOCUMENT_SUBTITLES,
        }
    )
    return render(request, "championship/documents.html", context)


def contacts(request):
    return render(request, "championship/contacts.html", base_context(request, "contacts.php"))


def application(request):
    context = base_context(request, "application.php")
    selected = request.GET.get("competence", "")
    if selected not in context["competencies"]:
        selected = ""
    context["selected_competence"] = selected
    context["now"] = datetime.now()
    return render(request, "championship/application.html", context)


def clean(value):
    return escape((value or "").strip())


def application_id():
    return f"YM-{datetime.now():%d%m%y}-{random.randint(100, 999)}"


@csrf_exempt
@require_POST
def process_application(request):
    try:
        app_id = application_id()
        fields = {
            "competence": clean(request.POST.get("competence")) or "Не указана",
            "age_category": clean(request.POST.get("age_category")),
            "mentor_name": clean(request.POST.get("mentor_name")),
            "mentor_position": clean(request.POST.get("mentor_position")),
            "organization": clean(request.POST.get("organization")),
            "mentor_phone": clean(request.POST.get("mentor_phone")),
            "mentor_email": clean(request.POST.get("mentor_email")),
            "team_size": clean(request.POST.get("team_size")),
            "clothing_size": clean(request.POST.get("clothing_size")),
            "participants_list": clean(request.POST.get("participants_list")),
            "video_link": clean(request.POST.get("video_link")),
        }

        upload_dir = settings.BASE_DIR / "uploads" / "applications" / app_id
        upload_dir.mkdir(parents=True, exist_ok=True)
        saved_files = []

        for uploaded in request.FILES.getlist("files[]") + request.FILES.getlist("files"):
            ext = uploaded.name.rsplit(".", 1)[-1].lower() if "." in uploaded.name else ""
            if ext not in ALLOWED_EXTENSIONS:
                raise ValueError(f"Файл '{uploaded.name}' имеет недопустимый тип")
            if uploaded.size > MAX_FILE_SIZE:
                raise ValueError(f"Файл '{uploaded.name}' превышает максимальный размер")

            target = upload_dir / Path(uploaded.name).name
            with target.open("wb+") as destination:
                for chunk in uploaded.chunks():
                    destination.write(chunk)
            saved_files.append(target)

        log_path = settings.BASE_DIR / "uploads" / "applications" / "applications.log"
        log_path.parent.mkdir(parents=True, exist_ok=True)
        with log_path.open("a", encoding="utf-8") as log:
            log.write(json.dumps({"id": app_id, "created_at": datetime.now().isoformat(), **fields}, ensure_ascii=False) + "\n")

        subject = f"Новая заявка: {fields['competence']}"
        body = (
            f"Новая заявка №{app_id}\n"
            f"Компетенция: {fields['competence']}\n"
            f"Категория: {fields['age_category']}\n"
            f"Участников: {fields['team_size']}\n"
            f"Наставник: {fields['mentor_name']}\n"
            f"Должность: {fields['mentor_position']}\n"
            f"Организация: {fields['organization']}\n"
            f"Телефон: {fields['mentor_phone']}\n"
            f"Email: {fields['mentor_email']}\n"
            f"Размер одежды: {fields['clothing_size']}\n"
            f"Видео: {fields['video_link']}\n\n"
            f"Участники:\n{fields['participants_list']}\n"
        )
        email = EmailMessage(subject, body, EMAIL["from"], [EMAIL["admin"], EMAIL["from"]])
        for target in saved_files:
            email.attach_file(target)
        try:
            email.send(fail_silently=True)
            if fields["mentor_email"]:
                send_mail(
                    f"Подтверждение получения заявки №{app_id}",
                    f"Ваша заявка №{app_id} принята.",
                    EMAIL["from"],
                    [fields["mentor_email"]],
                    fail_silently=True,
                )
        except Exception:
            pass

        return JsonResponse(
            {
                "success": True,
                "application_id": app_id,
                "message": "Заявка успешно отправлена! Подтверждение отправлено на ваш email.",
            }
        )
    except Exception as exc:
        return JsonResponse({"success": False, "message": f"Ошибка обработки данных: {exc}", "application_id": ""})


@csrf_exempt
@require_POST
def send_contact(request):
    try:
        name = clean(request.POST.get("name"))
        email = clean(request.POST.get("email"))
        subject_key = clean(request.POST.get("subject"))
        message = clean(request.POST.get("message"))
        if not all([name, email, subject_key, message]):
            raise ValueError("Все поля формы обязательны для заполнения")

        subjects = {
            "registration": "Регистрация и документы",
            "competence": "Вопросы по компетенциям",
            "schedule": "Расписание и сроки",
            "technical": "Технические вопросы",
            "other": "Другое",
        }
        subject_text = subjects.get(subject_key, subject_key)
        send_mail(
            f"Обращение через форму контактов: {subject_text}",
            f"Имя: {name}\nEmail: {email}\nТема: {subject_text}\n\n{message}",
            EMAIL["from"],
            [EMAIL["admin"]],
            fail_silently=True,
        )
        return JsonResponse({"success": True, "message": "Ваше сообщение успешно отправлено! Мы ответим в течение 24 часов."})
    except Exception as exc:
        return JsonResponse({"success": False, "message": str(exc)})
