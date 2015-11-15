    $(document).ready(function() {
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