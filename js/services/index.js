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
	set_card();
}

document.addEventListener(
    "DOMContentLoaded", 
    init
);