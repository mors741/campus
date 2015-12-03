var login_correct = false;

function validate_uniq(value, element) {
    if (value.substr('campus.mephi.ru')) {
        req = {
            'type' : 'check_login',
            'login' : value
        }
        $.post(
            "/campus/api/user.php", JSON.stringify(req),
            function validate_handler(response) {
                login_correct = response['is_free'];
                if ( !login_correct ) {
                    $('#login-error').attr('class', 'error');
                    $('#login-error').text('Этот логин занят');
                }
                return login_correct;
            }, "json");
    }
    return login_correct;
}

function validate_email(value, element) {
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
};

function set_validators() {
    $.validator.addMethod('userUnique', validate_uniq);
    $.validator.addMethod('mephiEmail', validate_email, 'Должна быть указана почта МИФИ');
    $.validator.addMethod('correctName',
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
        }, 'Только латинские и русские буквы и символы \' _ -');

    $.validator.addMethod('passCheck',
        function (value, element) {
            var res = /[!%\./\,/\{/\}/<>"&*?\\//\]/\[/\|/;~`$^:=+\(/\)/#@№"\'/]/g ;
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
            email: {
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
            yes: {
                required: true
            },
            home: {
                required:true,
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
            email: {
                userUnique: "Этот логин занят",
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
            if (login_correct) {
                send_registration();
            }
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
    //$('#pass').pstrength();
}


function wait() {
    if (window.jQuery)
        set_validators();
    else
        setTimeout(wait, 50);
}

wait();