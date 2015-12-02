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

    $("#mark_modal").modal("hide");

    req = { 
        'type' : 'set_state',
        'id' : id,
        'state' : 'Подтверждено',
        'comment' : comment.value,
        'mark' : mark.value,
    };

    $.post(
        "/campus/api/service.php", 
        JSON.stringify(req), 
        function() { 
            comment.value = "";
            mark.value = "";
            return; 
        }, 
        "json"
    );

    $("#grid-basic").bootgrid('reload');
}

function start_claim_modal(id)
{
    button = document.getElementById("claim_btn");
    button.setAttribute("onclick", "complained(" + id + ")");
    $("#claim_modal").modal("show");
}

function complained(id) 
{
    claim = document.getElementById("claim");

    $("#claim_modal").modal("hide");

    req = { 
        'type' : 'set_state',
        'id' : id,
        'state' : 'Подтверждено',
        'comment' : claim.value,
        'mark' : 0
    };
    $.post(
        "/campus/api/service.php", 
        JSON.stringify(req), 
        function() { 
            claim.value = "";
            return; 
        }, 
        "json"
    );
    
    $("#grid-basic").bootgrid('reload');
}

function set_command(column, row) 
{
    var html;
    switch ( row["state"] ) {
        case "Выполнено":
            html = "<button data-row-id=\"" + row.id + "\"onclick=\"start_mark_modal(" + row.id + ")\">Подтвердить выполнение</button> " +
                "<button data-row-id=\"" + row.id + "\" onclick=\"start_claim_modal(" + row.id + ")\">Пожаловаться</button>";
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

window.onload  = function()
{
    document.cookie = "login=admin@campus.mephi.ru";
    document.cookie = "id=1";
    document.cookie = "role=admin";
    $("#grid-basic").bootgrid({
        ajax: true,
        ajaxSettings : {
            type: "POST",
            dataType: 'json',
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