function permissions()
{
	var role = getCookie("role");
    if (role == 'guest') {
		alert('У вас нет прав доступа на эту страницу');
		window.location.replace("/campus/");
	}
}

document.addEventListener(
    "DOMContentLoaded", 
    permissions
);