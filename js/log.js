
    function log() {

        $("#authform").submit(function(event){
            return false;
        });

        login = document.getElementById('authlogin').value;
        pass = document.getElementById('password').value;
        memory = document.getElementById('memory').value;

        req = {
            'type': "login",
            'login': login,
            'pass': pass
        };
        $.post(
            "/campus/api/user.php",
            JSON.stringify(req),
            ans,
            "json"
        );
        function ans(data) {

            if (data['success'] == true) {

                $('#myModal').modal('hide');

                document.getElementById('auth_and_reg1').style.display="none";
                document.getElementById('auth_and_reg2').style.display="none";
                document.getElementById('sign-out1').style.display="block";
                document.getElementById('sign-out2').style.display="block";
                document.getElementById('login').innerHTML = data.login;

                mydiv = document.createElement('div');
                mydiv.className = 'm_auth m_success';
                mydiv.innerHTML += 'Добро пожаловать, ' + data.login;
                document.getElementById('sign-out1').appendChild(mydiv);
                //window.location.reload();

            }
            else {

                mydiv = document.createElement('div');
                mydiv.className = 'm_auth m_error';
                mydiv.innerHTML += 'Неверный логин или пароль';
                document.getElementById('auth_and_reg2').appendChild(mydiv);
            }
            return;
        }


    }


