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
        'state' : 'Оценено',
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