from django.conf import settings
from django.conf.urls.static import static
from django.contrib import admin
from django.urls import path, re_path
from django.views.static import serve

from championship import views


urlpatterns = [
    path("admin/", admin.site.urls),
    path("", views.index, name="home"),
    path("index.php", views.index, name="index"),
    path("about.php", views.about, name="about"),
    path("competencies.php", views.competencies, name="competencies"),
    path("documents.php", views.documents, name="documents"),
    path("contacts.php", views.contacts, name="contacts"),
    path("application.php", views.application, name="application"),
    path("process_application.php", views.process_application, name="process_application"),
    path("send_contact.php", views.send_contact, name="send_contact"),
    re_path(r"^(?P<path>styles\.css|script\.js)$", serve, {"document_root": settings.BASE_DIR}),
    re_path(r"^(?P<path>assets/.*)$", serve, {"document_root": settings.BASE_DIR}),
    re_path(r"^(?P<path>documents/.*)$", serve, {"document_root": settings.BASE_DIR}),
    re_path(r"^(?P<path>materials/.*)$", serve, {"document_root": settings.BASE_DIR}),
    re_path(r"^(?P<path>uploads/.*)$", serve, {"document_root": settings.BASE_DIR}),
]

if settings.DEBUG:
    urlpatterns += static(settings.STATIC_URL, document_root=settings.STATIC_ROOT)
