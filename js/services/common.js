function set_card() 
{
    var path = window.location.pathname;
    var path_all = "/campus/services/all.php";
    var path_mine = "/campus/services/mine.php";
    var path_index = "/campus/services/";
    var path_index_full = "/campus/services/index.php";
    var path_staff = "/campus/services/staff.php";
    var path_dome = "/campus/";

    var all = "<a class=\"btn btn-default\" href=" + path_all + ">Просмотр всех заявок</a> ";
    var mine = "<a class=\"btn btn-default\" href=" + path_mine + ">Просмотр моих заявок</a> ";
    var index = "<a class=\"btn btn-default\" href=" + path_index + ">Добавить заявку</a> ";
    var staff = "<a class=\"btn btn-default\" href=" + path_staff + ">Рейтинг персонала</a> ";

    var role = getCookie("role");
    var home = getCookie("home");

    switch(path) {
        case path_index:
            if (role == "guest" || role == "local") {
                window.location.replace(path_dome);  
            } 
            if (home == "0"){
            	alert(home);
                window.location.replace(path_all); 
            }
            break;
        case path_index_full:
            if (role == "guest" || role == "local") {
                window.location.replace(path_dome);  
            } 
            if (home == "0"){
            	alert(home);
                window.location.replace(path_all); 
            }
            break;
        case path_mine:
            if (role == "guest" || role == "local") {
                window.location.replace(path_dome);
            } 
            if (home == "0"){
                window.location.replace(path_all); 
            }
            break;
        case path_all:
            if (role == "guest" || role == "local" || role == "campus") {
                window.location.replace(path_dome);
            }   
            break;
        case path_staff:
            if (role == "guest" || role == "local" || role == "campus" || role == "staff") {
                window.location.replace(path_dome);
            }
            break;
    }

    var html = "";
    switch(role) {
        case "staff":
            if (home != "0") {
                html = index + mine;
            }
            html += all;
            break;
        case "campus":
            html = index + mine;
            break;
        default:
            if (home != "0") {
                html = index + mine;
            }
            html += all + staff;
            break;
    }

    var card = document.getElementById("card");
    card.innerHTML = html;
}

function get_timeint(id) 
{
    var ans;
    switch(id) {
        case "1":
        ans = "9:00 - 9:45";
        break;
        case "2":
        ans = "10:00 - 10:45";
        break;
        case "3":
        ans = "11:00 - 11:45";
        break;
        case "4":
        ans = "12:00 - 12:45";
        break;
        case "5":
        ans = "13:00 - 13:45";
        break;
        case "6":
        ans = "14:00 - 14:45";
        break;
        case "7":
        ans = "15:00 - 15:45";
        break;
        case "8":
        ans = "16:00 - 16:45";
        break;
        default:
        ans = "ошибка";
        break;
    }
    return ans;
}

function get_datetime(row)
{   
    return row['ordate'] + ' ' + get_timeint(row['timeint']);
}

function get_mark(id)
{
    var ans = "";
    switch(id) {
        case "1":
        ans = "Ужасно";
        break;
        case "2":
        ans = "Плохо";
        break;
        case "3":
        ans = "Нормально";
        break;
        case "4":
        ans = "Хорошо";
        break;
        case "5":
        ans = "Отлично";
        break;
    }
    return ans;
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