<?php
	if ($user_data['role'] == "local") {
        echo "<script>alert(\"У вас нет доступа к услугам.\");</script>"; 
        echo "<script>setTimeout(\"location.href = '/campus/index.php';\",500);</script>";
        exit();
    }
?>