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