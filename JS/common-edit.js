$(document).ready(function () {

    function isCorrectName(value) {
              var res = /[!%\./\,/\{/\}/<>"&*?\\//\]/\[/\|/;~`$^:=+\(/\)/#@№"0-9]/g;
                var reg2 = /[a-zA-Zа-яЁА-ЯЁ'_-]/g;                  
                var result = res.test(value);
                var result2 = reg2.test(value);

                if (result === false && result2===true) {
                    return true;
                }

    }

    function isCorrectRoom(value) {
         var res = /[!%\./\,/\{/\}/<>"&*?\\//\]/\[/\|/;~`$^:=+\(/\)/#@№"']/g;
                var reg2 = /[0-9]{1,4}/g;
                var reg3 =/[а-яёА-ЯЁA-Za-z]/g;
                   
                var result = res.test(value);
                var result2 = reg2.test(value);
                var result3=reg3.test(value);
               
                if (result===false && result2===true && result3===false){
                return true;
            }
    }

    $('#password').blur(function ()
    {
        var value = ($("#password").val());
        $.ajax({
            type: "POST",
            url: "lib/edit_pass.php",
            data: "value=" + value,
            dataType: "html",
            cache: false,
            success: function (response)
            {

                if (response == "0") {
                    $('#password-error').attr('class', 'error');
                    $('#password-error').css('display', 'inline-block');
                    $('#password-error').text('Неверный старый пароль');
                    $("#passwd").prop("disabled", true);
                    $("#submit_pass").prop('type', 'hidden');

                    return false;
                } else
                {
                    $('#password-error').attr('class', 'valid');
                    $('#password-error').css('display', 'inline-block');
                    $('#password-error').text('');
                    $('#passwd').prop("disabled", false);
                    $("#submit_pass").prop('type', 'submit');

                    return true;
                }
            }

        });

    });
    
    
    $(".editable").editable("http://localhost/campus/lib/edit.php",
            {
                cancel: 'Отмена',
                submit: 'Сохранить',
                indicator: '',
                tooltip: "Щелкните, чтобы отредактировать это поле",
                onsubmit: function (settings, div) {
                    var input = $(div).find('input');
                    var original = input.val();

                    if (isCorrectName(original)) {
                        $("#name-error").text('');
                        $("#name-error").attr('class', 'valid');
                         $("#name-error").css('display', 'inline-block');
                        
                        input.css('border-color', '#008800').css('color', '#fff');
                        return true;
                    } else {
                        $("#name-error").attr('class', 'error');
                        $("#name-error").css('display', 'inline-block');
                        $("#name-error").text('Только русские буквы и знаки подчеркивания _-');
                        input.css('border-color', '#c00').css('color', '#red');
                        return false;
                    }
                }

            }
    );
    
    $(".editable_select").editable("http://localhost/campus/lib/edit.php", {
        data: "{'М':'Мужской','Ж':'Женский'}",
        type: "select",
        cancel: 'Отмена',
        submit: 'Сохранить',
        tooltip: "Щелкните, чтобы отредактировать это поле"
    });




    $('#datetimepicker1').datetimepicker({pickTime: false, language: 'ru',  format: 'YYYY-MM-DD', daysOfWeekDisabled: [0, 6]});
    
    $('#datetimepicker1').change(function ()
    {
        var value = ($("#bdate").val());
        var id = "bdate";
        $.ajax({
            type: "POST",
            url: "lib/edit.php",
            data: "value=" + value + "&id=" + id,
            dataType: "html",
            cache: false,
            success: function (response)
            {

                if (response == "0") {

                    $('#bdate_save').text('Ошибка соединение с базами данных');
                    return false;
                } else
                {
                    $('#bdate_save').text('Дата успешно сохранена');

                    return true;
                }
            }

        });





    });


    $(".editable_contact").editable("http://localhost/campus/lib/edit.php",
            {
                cancel: 'Отмена',
                submit: 'Сохранить',
                type: 'masked',
                mask: '8(999)999-99-99',
                indicator: '',
                tooltip: "Щелкните, чтобы отредактировать контакты"


            }
    );


    $(".editable_address").editable("http://localhost/campus/lib/edit.php", {
        data: "{'1':'ул. Москворечье д.2 корп 1','2':'ул. Москворечье д.2 корп 2','3':'ул. Москворечье, д.19 корп 3','4':'ул. Москворечье, д.19 корп 4','5':'ул. Кошкина д.11 корп. 1','6':'ул. Шкулева д.27 ст 2','7':'ул. Пролетарский проспект д. 8 корп. 2'}",
        type: "select",
        cancel: 'Отмена',
        submit: 'Сохранить',
        tooltip: "Щелкните, чтобы отредактировать это поле"
    });


    $(".editable_room").editable("http://localhost/campus/lib/edit.php",
            {
                cancel: 'Отмена',
                submit: 'Сохранить',
                tooltip: "Щелкните, чтобы отредактировать это поле",
                onsubmit: function (settings, div) {
                    var input = $(div).find('input');
                    var original = input.val();

                    if (isCorrectRoom(original)) {
                        $("#room-error").text('');
                        $('#room-error').css('display', 'inline');
                        $("#room-error").attr('class', 'valid');
                        input.css('border-color', '#008800').css('color', '#fff');
                        return true;
                    } else {
                        $("#room-error").attr('class', 'error');
                        $("#room-error").css('display', 'inline-block');
                        $("#room-error").text('Только номер квартиры');
                        input.css('border-color', '#c00').css('color', '#red');
                        return false;
                    }
                }

            }
    );



    $("#bdate").mask("9999-99-99", {placeholder: "____-__-__"});


    });/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


