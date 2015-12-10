function set_user_data(resp) {
	for ( key in resp ) {
		selector = "label[for='" + key + "']";
		$(selector).append(resp[key]);
	}
	$('#picture').attr('src', resp['picture']);
}

function get_user_data(resp) {
	if ( resp['login'] != 'guest' ) {
		req = {
			'type' : 'get',
			'login' : resp['login']
		};
		$.post("/campus/api/user.php", JSON.stringify(req), set_user_data, "json");	
	}
}

function getCookie(name) 
{
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

function add_registration(resp) {
	href = $('<a>');
	href.attr('class', "btn btn-default");
	href.attr('href', "/campus/registration/staff.php");
	href.text('Регистрация персонала');
	$('#links').append(href);
}

document.addEventListener(
	"DOMContentLoaded", 
	function(){
		req = { 'type' : 'current'};
		$.post("/campus/api/user.php", JSON.stringify(req), get_user_data, "json");
		if ( getCookie("role") == 'admin' ) {
			add_registration();
		}
	}
);