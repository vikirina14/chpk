from django import template


register = template.Library()


@register.filter
def get_item(mapping, key):
    return mapping.get(key, "") if mapping else ""


@register.filter
def file_icon(path):
    ext = str(path).rsplit(".", 1)[-1].lower()
    if ext == "docx" or ext == "doc":
        return "fa-file-word"
    if ext == "zip":
        return "fa-file-archive"
    if ext in {"jpg", "jpeg", "png"}:
        return "fa-file-image"
    return "fa-file-pdf"
