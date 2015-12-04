function set_card() 
{
    var path_all = "/campus/services/all.php";
    var path_mine = "/campus/services/mine.php";
    var path_index = "/campus/services/";
    var path_staff = "/campus/services/staff.php";

    var all = "<a class=\"btn btn-default\" href=" + path_all + ">Просмотр всех заявок</a> ";
    var mine = "<a class=\"btn btn-default\" href=" + path_mine + ">Просмотр моих заявок</a> ";
    var index = "<a class=\"btn btn-default\" href=" + path_index + ">Добавить заявку</a> ";
    var staff = "<a class=\"btn btn-default\" href=" + path_staff + ">Рейтинг персонала</a> ";

    var role = getCookie("role");
    var home = getCookie("home");

    var action = {
        "admin": all + staff,
        "manage": all + staff, 
        "staff": all,
        "moder": all + staff,
        "campus": "",
        "local": "",
        "guest": "",
    }

    var html = "";
    if ( home != "0" ) {
        html = index + mine;
    }
    html += action[role];

    var card = document.getElementById("card");
    card.innerHTML = html;
}

function get_timeint(id) 
{
    var time = {
        "1": "9:00 - 9:45",
        "2": "10:00 - 10:45",
        "3": "11:00 - 11:45",
        "4": "12:00 - 12:45",
        "5": "13:00 - 13:45",
        "6": "14:00 - 14:45",
        "7": "15:00 - 15:45",
        "8": "16:00 - 16:45",
    }
    return time[id];
}

function get_datetime(row)
{   
    return row['ordate'] + '\n' + get_timeint(row['timeint']);
}

function get_mark(id)
{
    var mark = {
        "1": "Ужасно",
        "2": "Плохо",
        "3": "Нормально",
        "4": "Хорошо",
        "5": "Отлично",
    }
    return mark[id];
}

function get_state_and_comment(row)
{
    var ans = row['state'];
    if ( row['comment'] ) {
        ans += "\n\"" + row['comment'] + "\"";
    }
    return ans;
}

function getCookie(name) 
{
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}