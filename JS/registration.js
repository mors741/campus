$(document).ready(function(){
	var login_correct = false;
    $.validator.addMethod(
        "uniqueUserName", 
        function(value, element) {
            $.ajax({
                type: "POST",
                url: "Other/check.php",
                data: "login="+value,
                dataType:"html",
				cache: false,
                success: function(response)
                {
					res = response;
					if(response == 1){
						//$('#login').css('border', '3px #C33 solid');	
						//$('#tick').hide();     							// галочка и крестик
						//$('#cross').fadeIn();  							// галочка и крестик
						//alert("ska");
						$('#login_error').fadeIn();
						login_correct = false;

					}else{
						//$('#login').css('border', '3px #090 solid');
						//$('#cross').hide();								// галочка и крестик
						//$('#tick').fadeIn();								// галочка и крестик
						$('#login_error').hide();
						login_correct = true;

					}
                }
            });
			if (login_correct==true) {
				return true;
			}
			else return false;
        },
        "Извините, этот логин уже занят"
    );

    $.validator.addMethod(
    	'mephiEmail',
    	function(value, element) {
    		var res = value.split('@');
			if (res[1] != 'mephi.ru'){
				return false;
			}
			res = res[0].match(/\w+/g);
			if (res == null || res.length > 1){
				return false;
			}
			return true;
		},
		'Должна быть указана почта МИФИ'
	);

	$.validator.addMethod(
    	'correctName',
    	function(value, element) {
    		var reg = /[a-zа-яё'_-]{1,64}/g;
			var res = value.match(reg);
			if (res == null || res.length > 1){
				return false//return false
			} 
			return true
		},
		'Только латинские и русские буквы и символы \' _ -'
	);

	$("#register-form").validate({
		rules: {
			login: {
				uniqueUserName: true,
				required: true,
				email: true,
				mephiEmail: true
			},
			name: {
				required: true,
				correctName: true
			},
			surname: {
				required: true,
				correctName: true
			},
			email: {
				required: true,
				email: true
			},
			home: {
			digits: true,
			},

			room: {
			digits: true,
			},
			password: {
				required: true,
				minlength: 5
			},
			rpassword: {
				equalTo: "#password"
			}
        },
		messages: {
			login: {
				uniqueUserName: "Извините, этот логин уже занят",
				required: "Пожалуйста, заполните поле",
				email: "Неверный формат e-mail",
                mephiEmail: "Должна быть указана почта МИФИ"
			},
			name: {
				required: "Пожалуйста, заполните поле",
				correctName: "Только латинские и русские буквы и символы \' _ -"
			},
			surname: {
				required: "Пожалуйста, заполните поле",
				correctName: "Только латинские и русские буквы и символы \' _ -"
			}, 
			password: {
				required: "Пожалуйста, введите пароль",
				minlength: "Минимальная длина пароля - 5 символов"
			},
			email: {
				required: "Пожалуйста, введите Ваш Email адрес",
				email:  "Некорректный формат Email адреса"
			},
			home: {
			digits: "Только в числовом виде",

			},
			room: {
			digits: "Только в числовом виде",
			},
			rpassword: "Пароли должны совпадать"
		},
		submitHandler: function(form) {
			if (login_correct)
				form.submit();
			else
				$('#login').focus();
		}
	});

	$("#yes").click(function(){
		if ($("input:checked").val() == "user") {
			$("#user").css('display', 'inline-block');
			$("#home").css('display', 'inline-block');
			$("#room").css('display', 'inline-block');
			$("#home").attr('type', 'text');
			$("#room").attr('type', 'text');
			$("#room").attr('value', '');
			$("#home").attr('value', '');
		}

	});

	$("#no").click(function(){
		if ($("input:checked").val() == "nouser") {
			$("#user").css('display', 'none');
			$("#home").attr('type', 'hidden');
			$("#room").attr('type', 'hidden');
			$("#room").attr('value', '');
			$("#home").attr('value', '');
		}

	});


});

