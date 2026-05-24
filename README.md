# YoungMasters на Django

Проект перенесен из PHP в отдельную папку `meow_python`.

## Запуск

```bash
python3 -m venv .venv
source .venv/bin/activate
pip install -r requirements.txt
python manage.py migrate
python manage.py runserver
```

После запуска откройте:

```text
http://127.0.0.1:8000/
```

Старые адреса сохранены: `/index.php`, `/about.php`, `/competencies.php`, `/documents.php`, `/contacts.php`, `/application.php`.

## Почта

По умолчанию письма выводятся в консоль сервера, а заявки сохраняются в `uploads/applications/applications.log` и файлы в `uploads/applications/<номер-заявки>/`.

Для SMTP можно задать переменные окружения:

```bash
export DJANGO_EMAIL_BACKEND=django.core.mail.backends.smtp.EmailBackend
export EMAIL_HOST=smtp.example.com
export EMAIL_PORT=587
export EMAIL_HOST_USER=user@example.com
export EMAIL_HOST_PASSWORD=password
export EMAIL_USE_TLS=true
```
