
    function log() {

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


            }
            else {


            }
            return;
        }


    }


