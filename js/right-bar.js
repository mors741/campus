$(document).ready(
  function()
  {
    $(".account").click(
      function()
      {
        var X=$(this).attr('id');

        if(X==1)
        {
          $(".submenu").hide();
          $(this).attr('id', '0');  
        }
        else
        {

          $(".submenu").show();
          $(this).attr('id', '1');
        } 
      }
    );

    //Mouseup textarea false
    $(".submenu").mouseup(
      function()
      {
        return false
      }
    );
    
    $(".account").mouseup(
      function()
      {
        return false
      }
    );

    $(document).mouseup(
      function()
      {
        $(".submenu").hide();
        $(".account").attr('id', '');
      }
    );    
  }
);
  window.onload = function() {

    var req = { type: "current" };
    $.post("/campus/api/user.php", JSON.stringify(req), ans, "json");

    function ans(data) {
      if (data.login != 'guest') {
        document.getElementById('auth_and_reg1').style.display="none";
        document.getElementById('auth_and_reg2').style.display="none";
        document.getElementById('sign-out1').style.display="block";
        document.getElementById('sign-out2').style.display="block";
        document.getElementById('login').innerHTML = data.login;
      } else {
        document.getElementById('auth_and_reg1').style.display="block";
        document.getElementById('auth_and_reg2').style.display="block";
        document.getElementById('sign-out1').style.display="none";
        document.getElementById('sign-out2').style.display="none";
      }
    }

  }
  function logout() {
    var req = { type: "logout" };
    $.post("/campus/api/user.php", JSON.stringify(req), ans, "json");

    function ans(data) {
      if (data.success == true) {
        location.href = '/campus/index.php';  
      };
    }
  }