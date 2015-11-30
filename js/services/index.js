function create()
{
		user = "";
	req = { 'type' : 'current'};
    user = $.post("/campus/api/user.php", JSON.stringify(req), function(data) {return data}, "json");
    console.log(user);

	service = document.getElementById('service').value;
	comment = document.getElementById('comment').value;
	timeint = document.getElementById('timeint').value;
	ordate = document.getElementById('ordate').value;
	ordate = ordate.split(".");
	ordate = ordate[2] + "-" + ordate[1] + "-" + ordate[0];

	req = {
		'type' : 'create',
		'login' : user,
		'performer_id' : get_performer_id, 
		'category_id' : service, 
		'description' : comment, 
		'ordate' : ordate, 
		'timeint' : timeint
	};
	console.log(req);
	$.post("/campus/api/service.php", JSON.stringify(req), function() { alert("Ваша заявка принята"); return; }, "json");
}

function get_performer_id()
{
	// Диман, ты мне должен вернуть id из таблицы staff
	return performer_id;
}