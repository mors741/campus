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
					if(response === 1){
	
						
				$('#login_error').css('display','inline');
						login_correct = false;

					}else{
														// галочка и крестик
						$('#login_error').css('display','none');
                                                $('#login_error').css('color','red');
						login_correct = true;

					}
                }
            });
	return true;		
        }
        
    );

    $.validator.addMethod(
    	'mephiEmail',
    	function(value, element) {
    		var res = value.split('@');
			if (res[1] !== 'campus.mephi.ru'){
				return false;
			}
			res = res[0].match(/\w+/g);
			if (res === null || res.length > 1){
				return false;
			}
			return true;
		},
		'Должна быть указана почта МИФИ'
	);

	$.validator.addMethod(
    	'correctName',
    	function(value, element){
    		var reg = /[a-zа-яё'_-]{1,64}/g;
			var res = value.match(reg);
			if (res === null || res.length > 1){
				return false;//return false
			}
			return true;
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

			
			pass: {
				required: true,
				minlength: 5
			},
			rpass: {
				equalTo: "#pass",
                                required: true
			},
                        yes:
                                {
                                required:true    
                                },
                                
                                home: {
			digits: true,
                        range: [0,4]
			},

			room: {
			digits: true
			},
                        agree: {
                            required: true
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
			pass: {
				required: "Пожалуйста, введите пароль",
				minlength: "Минимальная длина пароля - 5 символов"
			},
                        rpass: {
                                equalTo: "Пароли должны совпадать",
                                required: "Обязателен для заполнения"
                            },
                            
                        yes: {
                          required: "Ответьте на вопрос!"
                        },    
			home: {
			digits: "Только в числовом виде",
                        range: "Только от 1 до 4"

			},
			room: {
			digits: "Только в числовом виде"
			},
                        
                        
                        agree: {
                          required: "Вы не приняли соглашение"  
                        }
			
		},
		submitHandler: function(form) {
			if (login_correct)
				form.submit();
			else
				$('#login').focus();
		}
	});

	$("#yes").click(function(){
		if ($("input:checked").val() === "user") {
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
		if ($("input:checked").val() === "nouser") {
			$("#user").css('display', 'none');
			$("#home").attr('type', 'hidden');
			$("#room").attr('type', 'hidden');
			$("#room").attr('value', '');
			$("#home").attr('value', '');
		}

	});


});

