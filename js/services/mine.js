function confirm(id)
{
    btn = document.getElementById("btn_confirmed");
    btn.setAttribute("onclick", "confirmed(" + id + ")");
    $("#confirmedModal").modal("show");
}

function confirmed(id)
{
    $("#confirmedModal").modal("hide");
    req = { 
        'type' : 'set_state',
        'id' : id,
        'state' : 'Подтверждено',
        'comment' : $('#comment').val(),
        'mark' : $('#mark').val()
    };
    $.post("/campus/api/service.php", JSON.stringify(req), function() { return; }, "json");
    $("#grid-basic").bootgrid('reload');
}

function complain(id)
{
    btn = document.getElementById("btn_complained");
    btn.setAttribute("onclick", "complained(" + id + ")");
    $("#complainModal").modal("show");
}

function complained(id) 
{
    $("#complainModal").modal("hide");
    req = { 
        'type' : 'set_state',
        'id' : id,
        'state' : 'Подтверждено',
        'comment' : $('#complain').val(),
        'mark' : 0
    };
    console.log(req);
    $.post("/campus/api/service.php", JSON.stringify(req), function() { return; }, "json");
    $("#grid-basic").bootgrid('reload');
}

function set_command(user, column, row) 
{
    var html;
    switch ( row["state"] ) {
        case "Выполнено":
            html = "<button data-row-id=\"" + row.id + "\" onclick=\"confirm(" + row.id + ")\">Подтвердить выполнение</button> " +
                "<button data-row-id=\"" + row.id + "\" onclick=\"complain(" + row.id + ")\">Пожаловаться</button>";
            break;
        case "Подтверждено":
            html = "Оценка: " + row["mark"];
            break;
        default:
            html = "Нет доступных действий";
            break;
    }
    return html;
}

function init(user) 
{
    $("#grid-basic").bootgrid({
        ajax: true,
        ajaxSettings : {
            type: "POST",
            dataType: 'json',
        },
        post: function ()
        {
            return {
                type: "get_needs",
                login: user['login']
            };
        },
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
