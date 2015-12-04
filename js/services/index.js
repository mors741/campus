function permissions()
{
    var path_all = "/campus/services/all.php";
    var path_home = "/campus/";
    var role = getCookie("role");
    var home = getCookie("home");

    if ( home == "0" ) {
	    var go_to = {
	        "admin": path_all,
	        "manage": path_all, 
	        "staff": path_all,
	        "moder": path_all,
	        "campus": path_home,
	        "local": path_home,
	        "guest": path_home,
	    }
	}
	else {
		var go_to = {
	        "admin": "",
	        "manage": "", 
	        "staff": "",
	        "moder": "",
	        "campus": "",
	        "local": path_home,
	        "guest": path_home,
	    }
	}

    go_to = go_to[role];

    if ( go_to ) {
        window.location.replace(go_to);
    }
}

function create()
{
	user_id = getCookie("id");

	service = document.getElementById('service').value;
	comment = document.getElementById('comment').value;
	timeint = document.getElementById('timeint').value;
	ordate = document.getElementById('ordate').value;
	ordate = ordate.split(".");
	ordate = ordate[2] + "-" + ordate[1] + "-" + ordate[0];

	req = {
		'type' : 'create',
		'id' : user_id,
		'category_id' : service, 
		'description' : comment, 
		'ordate' : ordate, 
		'timeint' : timeint
	};
	$.post(
		"/campus/api/service.php", 
		JSON.stringify(req), 
		function(data) { 
			if (data['success'] == true) {
				alert("Ваша заявка принята");
				window.location.replace("/campus");
			}
			else {
				alert("Что-то пошло не так");
			}
			return; 
		}, 
		"json"
	);
}

function init() 
{
	permissions();
	set_card();
}

document.addEventListener(
    "DOMContentLoaded", 
    init
);