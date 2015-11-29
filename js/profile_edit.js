function set_user_data(resp) {
	for ( key in resp ) {
		selector = "#" + key + "";
		alert(selector);
		$(selector).val(resp[key]);
	}
}

function get_user_data(resp) {
	if ( resp['login'] != 'guest' ) {
		req = {
			'type' : 'get',
			'login' : resp['login'],
			'raw' : true
		};
		$.post("/campus/api/user.php", JSON.stringify(req), set_user_data, "json");	
	} else {
		alert('unauthorized');
	}
}

window.onload  = function(){
	req = { 'type' : 'current'};
	$.post("/campus/api/user.php", JSON.stringify(req), get_user_data, "json");
};