function permissions()
{
    var path_all = "/campus/services/all.php";
    var path_home = "/campus/";
    var role = getCookie("role");
    var home = getCookie("home");

    var go_to = {
        "admin": "",
        "manage": "", 
        "staff": path_home,
        "moder": "",
        "campus": path_home,
        "local": path_home,
        "guest": path_home,
    }

    go_to = go_to[role];

    if ( go_to ) {
        if ( go_to == path_home ) {
            alert("У вас нет доступа")
        }
        window.location.replace(go_to);
    }
}

function set_post()
{
    if ( getCookie("role") == "staff" ) {
        post = { type: "get_rating", performer_id: getCookie("id") };
    }
    else {
        post = { type: "get_rating" };
    }
    return post;
}

function init()
{    
    set_card();

    $("#grid-basic").bootgrid({
        ajax: true,
        ajaxSettings : {
            type: "POST",
            dataType: 'json',
        },
        post: set_post(),
        url: "/campus/api/service.php",
        formatters: {
        }
    })
}

document.addEventListener(
    "DOMContentLoaded", 
    init
);

permissions();