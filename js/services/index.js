var old_data = "";

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
	ordate = time_convert(ordate);
	
	if ( !service ) {
		alert("Выберите тип оказываемой услуги.");
		return;
	}
	if ( !timeint ) {
		alert("Выберите доступное временное окно или смените дату.");
		return;
	}
	if ( !ordate ) {
		alert("Выберите доступную дату");
		return;
	}
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

function set_free_time(resp)
{
	if (resp['success'] == true) {
		have_free = false;
		for ( key in resp['state'] ) {
			have_free = have_free || resp['state'][key];
			if ( resp['state'][key] ) {
				option = $("<option>");
				option.text(get_timeint(key));
				option.attr('value', key);
				$('#timeint').append(option);
			}
		}
		if  ( !have_free ) {
			alert('На эту дату запись окончена');
		}
	} else {
		alert("Что-то пошло не так");
	}
}

function time_convert(ordate)
{
	ordate = ordate.split(".");
	ordate = ordate[2] + "-" + ordate[1] + "-" + ordate[0];
	return ordate;
}

function update_free_time()
{
	req = {
		'type' : 'get_free_time',
		'date' : time_convert($('#ordate').val()),
		'sid' : $('#service').val()
	}
	
	$('#timeint').html("");
	$.post(
		"/campus/api/service.php", 
		JSON.stringify(req), set_free_time, "json"
	);
}

function bind_date()
{
	if ( old_data != $('#ordate').val() ) {
		update_free_time();
	}
	old_data = $('#ordate').val();
	setTimeout(bind_date, 100);
}

function init() 
{
	permissions();
	set_card();
	$('#service').change(update_free_time);
	old_data = $('#ordate').val();
	bind_date();
}

document.addEventListener(
    "DOMContentLoaded", 
    init
);