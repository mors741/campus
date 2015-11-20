$(document).ready(function () {
var dtCh= "-";
var minYear=1900;
var maxYear=2100;

function isInteger(s){
	var i;
    for (i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function stripCharsInBag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){   
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function daysInFebruary (year){
	// February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
	for (var i = 1; i <= n; i++) {
		this[i] = 31
		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
		if (i==2) {this[i] = 29}
   } 
   return this
}

function isDate(dtStr){
	var daysInMonth = DaysArray(12);
	var pos1=dtStr.indexOf(dtCh);
	var pos2=dtStr.indexOf(dtCh,pos1+1);
	var strYear=dtStr.substring(0,pos1);
	var strMonth=dtStr.substring(pos1+1,pos2);
	var strDay=dtStr.substring(pos2+1);
	strYr=strYear;
	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1);
	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1);
	for (var i = 1; i <= 3; i++) {
		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1);
	}
	month=parseInt(strMonth);
	day=parseInt(strDay);
	year=parseInt(strYr);

	if (strMonth.length<1 || month<1 || month>12){
		return 2;
	}
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
		return 3;
	}
	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		return 4;
	}
	if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
		return 5;
	}
return true;
}

    function isCorrectName(value) {
        var res = /[!%\./\,/\{/\}/<>"&*?\\//\]/\[/\|/;~`$^:=+\(/\)/#@№"0-9]/g;
        var reg2 = /[a-zA-Zа-яЁА-ЯЁ'_-]/g;
        var result = res.test(value);
        var result2 = reg2.test(value);

        if (result === false && result2 === true) {
            return true;
        }

    }

    function isCorrectRoom(value) {
        var res = /[!%\./\,/\{/\}/<>"&*?\\//\]/\[/\|/;~`$^:=+\(/\)/#@№"']/g;
        var reg2 = /[0-9]{1,4}/g;
        var reg3 = /[а-яёА-ЯЁA-Za-z]/g;

        var result = res.test(value);
        var result2 = reg2.test(value);
        var result3 = reg3.test(value);

        if (result === false && result2 === true && result3 === false) {
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


    $(".editable").editable("../campus/lib/edit.php",
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

    $(".editable_select").editable("../campus/lib/edit.php", {
        data: "{'М':'Мужской','Ж':'Женский'}",
        type: "select",
        cancel: 'Отмена',
        submit: 'Сохранить',
        tooltip: "Щелкните, чтобы отредактировать это поле"
    });





    $('#datetimepicker2').datetimepicker({
        pickTime: false,
        language: 'ru',
        defaultDate: moment(),
        minDate: "1930-01-10",
        format : 'YYYY-MM-DD',
        maxDate : moment()
    });
    
    $('#datetimepicker2').change(function ()
    {
        var value = ($("#bdate").val());
        var id = "bdate";

        if (isDate(value)==2)
        {
         $("#bdate_save").css('display', 'inline-block');
         $("#bdate_save").attr('class', 'error'); 
         $('#bdate_save').text('Введите правильный месяц');                            
   return false;    
        }
        if (isDate(value)==3)
        {
         $("#bdate_save").css('display', 'inline-block');
         $("#bdate_save").attr('class', 'error'); 
         $('#bdate_save').text('Введите правильный день');                            
   return false;   
        }
        if (isDate(value)==4)
        {
         $("#bdate_save").css('display', 'inline-block');
         $("#bdate_save").attr('class', 'error'); 
         $('#bdate_save').text('Введите год с 1930 по 2015');                            
   return false;   
        }
         if (isDate(value)==5)
        {
         $("#bdate_save").css('display', 'inline-block');
         $("#bdate_save").attr('class', 'error'); 
         $('#bdate_save').text('Введите правильную дату');                            
   return false;   
        }
        if (isDate(value)) {
        
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
                    $("#bdate_save").attr('class', 'valid');
                    $("#bdate_save").css('display', 'inline-block');

                    return true;
                }
            }

        });
    }





    });

			


			


    $(".editable_contact").editable("../campus/lib/edit.php",
            {
                cancel: 'Отмена',
                submit: 'Сохранить',
                type: 'masked',
                mask: '8(999)999-99-99',
                indicator: '',
                tooltip: "Щелкните, чтобы отредактировать контакты"


            }
    );


    $(".editable_address").editable("../campus/lib/edit.php", {
        data: "{'0':'Я больше не проживаю в общежитии','1':'ул. Москворечье д.2 корп 1','2':'ул. Москворечье д.2 корп 2','3':'ул. Москворечье, д.19 корп 3','4':'ул. Москворечье, д.19 корп 4','5':'ул. Кошкина д.11 корп. 1','6':'ул. Шкулева д.27 ст 2','7':'ул. Пролетарский проспект д. 8 корп. 2'}",
        type: "select",
        cancel: 'Отмена',
        submit: 'Сохранить',
        tooltip: "Щелкните, чтобы отредактировать это поле"
    });


    $(".editable_room").editable("../campus/lib/edit.php",
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







});


