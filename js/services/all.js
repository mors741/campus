function permissions()
{
    var path_all = "/campus/services/all.php";
    var path_home = "/campus/";
    var role = getCookie("role");
    var home = getCookie("home");

    var go_to = {
        "admin": "",
        "manage": "", 
        "staff": "",
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

function del(id)
{
    req = { 
        'type' : 'delete',
        'id' : id
    };
    $.post("/campus/api/service.php", JSON.stringify(req), function() { return; }, "json");
    $("#grid-basic").bootgrid('reload');
}

function completed(id)
{
    req = { 
        'type' : 'set_state',
        'id' : id,
        'state' : 'Выполнено'
    };
    $.post("/campus/api/service.php", JSON.stringify(req), function() { return; }, "json");
    $("#grid-basic").bootgrid('reload');
}

function set_command(column, row) 
{
    var html;
    var role = getCookie("role");
    switch ( row["state"] ) {
        case "Выполнено":
        break;
        case "Оценено":
        break;
        case "Жалоба":
        break;
        default:
        if ( role == "staff" ) {
            html = "<button data-row-id=\"" + row.id + "\" onclick=\"completed(" + row.id + ")\">Выполнено</button>";
        } 
        else {
            html = "<button data-row-id=\"" + row.id + "\" onclick=\"del(" + row.id + ")\">Удалить</button>";
        }
        break;
    }
    return html;
}

function set_post()
{
    if ( getCookie("role") == "staff" ) {
        post = { type: "get_data", performer_id: getCookie("id") };
    }
    else {
        post = { type: "get_data", performer_id: -1 };
    }
    return post;
}

function init()
{    
    permissions();
    set_card();

    $("#grid-basic").bootgrid({
        ajax: true,
        ajaxSettings : {
            type: "POST",
            dataType: 'json',
        },
        templates: {
            search: ""
        },
        post: set_post(),
        url: "/campus/api/service.php",
        formatters: {
            "commands": function(column, row)
            {
                return set_command(column, row);
            },
            "time_and_date": function(column, row)
            {
                return get_datetime(row);
            },
            "state_and_comment": function(column, row) 
            {
                return get_state_and_comment(row);
            },
        }
    })
}

document.addEventListener(
    "DOMContentLoaded", 
    init
);

permissions();