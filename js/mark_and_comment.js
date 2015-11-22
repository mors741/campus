function enterMark(self, id) {
	par = $(self).parent();
	par.html("" + 
		"<div id=\"rating\">" +
		"</div>");
	$('#rating').rating({
		row_id: id,
        fx: 'full',
        image: 'images/stars.png',
        loader: 'images/ajax-loader.gif',
        url: 'lib/ajax.php',
        callback: function(responce){
            this.vote_success.fadeOut(2000);
            if (responce.status == 'OK') {
            	row = document.getElementById("grid-basic").rows[id].cells;
            	row[6].innerHTML = responce.state;
            	// Настучать по лбу, кто сделал табличку без id
            }
        }
    });
}

function enterComment(id) {
	
	$("#myModal").modal();

    
   $(function () { $('#myModal').on('submit', function () {
    
   var msg = $('#message-comment').val();
   //alert(msg);	

	$.ajax({
	    type: "POST",
        url: "lib/blame.php",
        data: "msg=" + msg,
        data:{'msg':msg,'id':id},
	   success: function(data) {
	        //alert(data);
	   }
	});   
  
   })});
}

function deleteOrder(id) {
	alert("deleteOrder\nid=" + id);
	//alert($('#grid-basic').bootgrid().data('.rs.jquery.bootgrid'));
	//alert(but);
	//alert(but.parentElement.nodeName);
	//alert(JSON.stringify($('#grid-basic').bootgrid().data('.rs.jquery.bootgrid')));
	//document.getElementById("bb1").hide();
	//alert();
}

function confirmOrder(id) {
	alert("confirmOrder\nid=" + id);
}