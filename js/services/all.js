function del(id)
{
    req = { 
        'type' : 'delete',
        'id' : id
    };
    $.post("/campus/api/service.php", JSON.stringify(req), function() { return; }, "json");
    $("#grid-basic-all").bootgrid('reload');
}

function completed(id)
{
    req = { 
        'type' : 'set_state',
        'id' : id,
        'state' : 'Выполнено'
    };
    $.post("/campus/api/service.php", JSON.stringify(req), function() { return; }, "json");
    $("#grid-basic-all").bootgrid('reload');
}

function set_command(column, row) 
{
    var html;
    var role = getCookie("role");
    switch ( row["state"] ) {
        case "Выполнено":
            html = "Ожидает подтверждения";
            break;
        case "Подтверждено":
            html = "Оценка: " + row["mark"];
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
        post = { type: "get_data" };
    }
    return post;
}

window.onload  = function()
{
    document.cookie = "login=admin@campus.mephi.ru";
    document.cookie = "id=1";
    document.cookie = "role=admin";
    $("#grid-basic-all").bootgrid({
        ajax: true,
        ajaxSettings : {
            type: "POST",
            dataType: 'json',
        },
        post: set_post(),
        url: "/campus/api/service.php",
        formatters: {
            "commands": function(column, row)
            {
                return set_command(column, row);
            }
        }
    })
}

function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}