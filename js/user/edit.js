login = "";
function set_user_data(resp) {
	for ( key in resp ) {
		selector = "#" + key + "";
		$(selector).val(resp[key]);
	}
}

function get_user_data(resp) {
	if ( resp['login'] != 'guest' ) {
		login = resp['login'];
		req = {
			'type' : 'get',
			'login' : resp['login'],
			'raw' : true
		};
		$.post("/campus/api/user.php", JSON.stringify(req), set_user_data, "json");	
	}
}

function set_houses(resp) {
	for ( var row = 0; row < resp.length; row++ ) { 
		option = $("<option>");
		option.text(resp[row]['street'] + ' ' + resp[row]['house']);
		option.attr('value', resp[row]['id']);
		$('#home').append(option);
	}
}

function update_password(){
	regexp = /[a-z0-9]+/
	req = { 'type' : 'update_pass' }
	req['pass'] = $('#password').val();
	req['new_pass'] = $('#passwd').val();


	if (req['new_pass'].match(regexp) =! req['new_pass'] || 
		req['new_pass'].length < 6 ||
		req['new_pass'].length > 16 ) {
		alert('Пароль должен быть не меньше 6 и не больше 16 символов и должен содержать только строчные латинские буквы и цифры');
		return;
	}


	$.post("/campus/api/user.php", JSON.stringify(req),
		function(resp) {
			if ( resp['success'] ) {
				alert('Пароль успешно обновлён');
			} else { 
				alert('Введен неправильный старый пароль');
			}
		}, "json"
	);
}

function update(){
	keys = ['home', 'name', 'surname', 'patronymic', 'gender', 'bdate', 'contacts', 'room'];
	nullable = ['home', 'gender'];
	pass = [];
	res = {'login' : login};
	for ( var i = 0; i < keys.length; i++ ) {
		res[keys[i]] =$('#' + keys[i]).val();
	}
	for ( var i = 0; i < nullable.length; i++ ) {
		if( res[nullable[i]] == -1 ){
			res[nullable[i]] = null;
		}
	}
	res['type'] = 'update';
	$.post("/campus/api/user.php",
		JSON.stringify(res));
}

document.addEventListener(
	"DOMContentLoaded", 
	function(){
		$.post("/campus/api/user.php",
			JSON.stringify({ 'type' : 'current'}), get_user_data, "json");
		$.post("/campus/api/user.php", 
			JSON.stringify({'type' : 'house'}), set_houses, "json");
		$('#update').click(update);
	}
);