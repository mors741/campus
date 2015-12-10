function set_houses(resp) {
	for ( var row = 0; row < resp.length; row++ ) { 
		if ( resp[row]['id'] > 0 ) {
			option = $("<option>");
			option.text(resp[row]['street'] + ' ' + resp[row]['house']);
			option.attr('value', resp[row]['id']);
			$('#home').append(option);
		}
	}
}

function send_registration() {
	req = { 'type' : 'create' }
	fields = {
		'email' : 'login',
		'pass' : 'passwd',
		'surname' : 'surname',
		'name' : 'name',
		'room' : 'room',
		'home' : 'home',
		'select_role' : 'role',
		'select_post' : 'post'
	}
	for ( var key in fields ) {
		req[fields[key]] = $('[name=' + key + ']').val();
	}
	if ( $('input:radio[name=yes]:checked').val() == 'nouser' ) {
		delete req['home'];
		delete req['room'];
	}
	$.post("/campus/api/user.php", JSON.stringify(req), registration_handler, "json");
}
function update_visible(){
	if ( $('#select_role').val() == 'staff' ){
		$('#staff').show();
	} else {
		$('#staff').hide();	
	}
}

function registration_handler(resp) {
	if ( resp['success'] ) {
		alert('Вы успешно зарегистрировались');
		window.location.replace("/campus/");
	} else {
		alert('Что-то пошло не так');
	}
}

document.addEventListener(
	"DOMContentLoaded", 
	function(){
		$.post("/campus/api/user.php", JSON.stringify({'type' : 'house'}), set_houses, "json");
	}
);

