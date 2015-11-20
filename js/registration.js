$(document).ready(function () {
    var login_correct = false;
    $.validator.addMethod(
            'userUnique',
            function (value, element) {
                if (element.value !== "")
                {
                    var founded = value.substr('campus.mephi.ru');
                    if (founded)
                    {
                        $.ajax({
                            type: "POST",
                            url: "lib/check.php",
                            data: "login=" + value,
                            dataType: "html",
                            cache: false,
                            success: function (response)
                            {

                                if (response == "1") {
                                    login_correct = false;
                                    $('#login-error').attr('class', 'error');
                                    $('#login-error').text('Извините, но этот логин занят');
                                    return false;
                                }
                                if (response == "0")
                                {
                                    
                                    login_correct = true;
                                    return true;
                                }
                            }

                        });
                    }
                    
                }
               
                return true;

            });



    $.validator.addMethod(
            'mephiEmail',
            function (value, element) {
                if ($('a[class="account btn-group-au"]').text()) {
                    return true;
                }
                var res = value.split('@');
                if (res[1] !== 'campus.mephi.ru') {
                    return false;
                }
                res = res[0].match(/\w+/g);
                if (res === null || res.length > 1) {
                    return false;
                }
                return true;
            },
            'Должна быть указана почта МИФИ'
            );



    $.validator.addMethod(
            'correctName',
            function (value, element) {
                      var res = /[!%\./\,/\{/\}/<>"&*?\\//\]/\[/\|/;~`$^:=+\(/\)/#@№"0-9]/g;
                var reg2 = /[a-zA-Zа-яёА-ЯЁ'_-]/g;                  
                var result = res.test(value);
                var result2 = reg2.test(value);
                if (result === true && result2===true) {
                    return false;
                }
                if (result === true && result2===false) {
                    return false;
                }

                
                return true;
            },
            'Только латинские и русские буквы и символы \' _ -'
            );

    $.validator.addMethod(
            'passCheck',
            function (value, element) {
               var res = /[!%\./\,/\{/\}/<>"&*?\\//\]/\[/\|/;~`$^:=+\(/\)/#@№"\'/]/g;
                var reg2 = /[0-9a-z_-]/g;
                var reg3 =/[а-яёА-ЯЁA-Z]/g;
                   
                var result = res.test(value);
                var result2 = reg2.test(value);
                var result3=reg3.test(value);
               
                if (result===false && result2===true && result3===false){
                return true;
            }
            },
            'Только строчные латинские буквы, цифры и знаки подчеркивания'
            );
jQuery.validator.setDefaults({
   debug: true,
   success: "valid"
    
});

    $("#register-form").validate({
        rules: {
            login: {
                userUnique: true,
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
                passCheck: true,
                required: true,
                minlength: 6,
                maxlength: 16
            },
            rpass: {
                equalTo: "#pass",
                required: true
            },
            yes:
                    {
                        required: true
                    },
            home: {
                required:true,
                range: [1,7]
            },
            room: {
                digits: true,
                required: true
             
            },
            agree: {
                required: true
            }

        },
        messages: {
            login: {
                userUnique: "Извините,но этот логин занят.",
                required: "Пожалуйста, заполните поле.",
                email: "Неверный формат e-mail.",
                mephiEmail: "Должна быть указана почта МИФИ."
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
                passCheck: "Только строчные латинские буквы, цифры и символы _-",
                required: "Пожалуйста, введите пароль",
                minlength: "Пароль должен быть не меньше 6 символов",
                maxlength: "Пароль должен быть не больше 16 символов"
            },
            rpass: {
                equalTo: "Пароли должны совпадать",
                required: "Обязателен для заполнения"
            },
            yes: {
                required: "Ответьте на вопрос!"
            },
            home: {
               range: "Выберите общежитие!"

            },
            room: {
                digits: "Только в числовом виде",
                required: "Заполните поле!"
            },
            agree: {
                required: "Вы не приняли соглашение"
            }

        },
      
        submitHandler: function (form) {
            if (login_correct)
                form.submit();
            else
                $('#login').focus();
        }
    });

    $("#yes").click(function () {
        if ($("input:checked").val() === "user") {
            $("#user").css('display', 'inline-block');
            $("#home").css('display', 'inline-block');
            $("#room").css('display', 'inline-block');
            $("#home").prop("disabled", false);
            $("#room").attr('type', 'text');
            $("#home [value='0']").attr('selected', 'selected');
        }

    });

    $("#no").click(function () {
        if ($("input:checked").val() === "nouser") {
            $("#user").css('display', 'none');
            $("#home [value='0']").attr('selected', 'selected');
            $("#home :first").attr('selected', 'selected');
            $("#home").prop("disabled", true);
            $("#room").attr('type', 'hidden');
            $("#room").attr('value', '');

        }

    });

    $('#pass').pstrength();
});

