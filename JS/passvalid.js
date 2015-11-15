    $(document).ready(function() {
     $.validator.addMethod(
            'passCheck',
            function (value, element) {
                var res = value;

                res = res.match(/[0-9A-Za-z_-]/);
                if (res === null || res.length > 1) {
                    return false;
                }
                return true;
            },
            'Только строчные латинские буквы, цифры и знаки подчеркивания'
            );
jQuery.validator.setDefaults({
   debug: true,
   success: "valid"
    
});

    $("#check_passwd").validate({
        rules: {

            
            passwd: {
                passCheck: true,
                required: true,
                minlength: 6,
                maxlength: 16
            }

        },
        messages: {
            
            passwd: {
                passCheck: "Только строчные латинские буквы, цифры и символы _-",
                required: "Пожалуйста, введите пароль",
                minlength: "Пароль должен быть не меньше 6 символов",
                maxlength: "Пароль должен быть не больше 16 символов"
            }
        },
      
        submitHandler: function (form) {
                form.submit();
        }
    });
    
    $('#passwd').pstrength();



});