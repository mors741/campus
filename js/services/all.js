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

function set_command(user, column, row) 
{
    var html;
    switch ( row["state"] ) {
        case "Выполнено":
            html = "Ожидает подтверждения";
            break;
        case "Подтверждено":
            html = "Оценка: " + row["mark"];
            break;
        default:
            if ( user["role"] == "staff" ) {
                html = "<button data-row-id=\"" + row.id + "\" onclick=\"completed(" + row.id + ")\">Выполнено</button>";
            } 
            else {
                html = "<button data-row-id=\"" + row.id + "\" onclick=\"del(" + row.id + ")\">Удалить</button>";
            }
            break;
    }
    console.log(html);
    return html;
}

function set_post(user)
{
    if ( user["role"] == "staff" ) {
        post = {
            type: "get_tasks",
            login: user["login"]
        };
    }
    else {
        post = {
            type: "get_tasks"
        };
    }
    return post;
}

function init(user) 
{
    $("#grid-basic-all").bootgrid({
        ajax: true,
        ajaxSettings : {
            type: "POST",
            dataType: 'json',
        },
        post: set_post(user),
        url: "/campus/api/service.php",
        formatters: {
            "commands": function(column, row)
            {
                return set_command(user, column, row);
            }
        }
    })
}

window.onload  = function()
{
    req = { 'type' : 'current'};
    $.post("/campus/api/user.php", JSON.stringify(req), init, "json");
}
