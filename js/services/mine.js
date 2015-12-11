function permissions()
{
    var path_all = "/campus/services/all.php";
    var path_home = "/campus/";
    var role = getCookie("role");
    var home = getCookie("home");

    if ( home == "0" ) {
        var go_to = {
            "admin": path_all,
            "manage": path_all, 
            "staff": path_all,
            "moder": path_all,
            "campus": path_home,
            "local": path_home,
            "guest": path_home,
        }
    }
    else {
        var go_to = {
            "admin": "",
            "manage": "", 
            "staff": "",
            "moder": "",
            "campus": "",
            "local": path_home,
            "guest": path_home,
        }
    }

    go_to = go_to[role];

    if ( go_to ) {
        if ( go_to == path_home ) {
            alert("У вас нет доступа")
        }
        window.location.replace(go_to);
    }
}

function start_mark_modal(id)
{
    button = document.getElementById("mark_btn");
    button.setAttribute("onclick", "confirmed(" + id + ")");
    $("#mark_modal").modal("show");
}

function confirmed(id)
{
    comment = document.getElementById("comment");
    mark = document.getElementById("mark");
    state = 'Оценено';
    console.log(mark.value + "-" + mark.value == 1 + "-" + mark.value == '1');
    if ( mark.value == 1 ) {
        state = 'Жалоба';
    }

    $("#mark_modal").modal("hide");

    req = { 
        'type' : 'set_state',
        'id' : id,
        'state' : state,
        'comment' : comment.value,
        'mark' : mark.value,
    };

    $.post(
        "/campus/api/service.php", 
        JSON.stringify(req), 
        function() { 
            comment.value = "";
            mark.value = "3";
            return; 
        }, 
        "json"
    );

    $("#grid-basic").bootgrid('reload');
}

function set_command(row) 
{
    var html;
    switch ( row["state"] ) {
        case "Выполнено":
            html = "<button data-row-id=\"" + row.id + "\"onclick=\"start_mark_modal(" + row.id + ")\">Оценить</button>";
            break;
        default:
            html = "";
            break;
    }
    return html;
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
        templates: {
            search: ""
        },
        post: function ()
        {
            return {
                type: "get_data",
                author_id: getCookie("id")
            };
        },
        url: "/campus/api/service.php",
        formatters: {
            "commands": function(column, row)
            {
                return set_command(row);
            },
            "time_and_date": function(column, row)
            {
                return get_datetime(row);
            },
            "mark": function(column, row)
            {
                return get_mark(row["mark"]);
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