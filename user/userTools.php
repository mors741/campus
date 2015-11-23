<?php

if ($user_data['role'] == 'admin' || $user_data['role'] == 'moder') {
    echo '<div role="tabpanel" class="tab-pane" id="tools">';
    echo <<<_EOT
    
    <div сlass="panel-heading">
                <h4 class="modal-title">Добавление нового пользователя</h4>
            </div>
            <div class="content">
                <span class="btn btn-default" onclick="location.href='registration.php'">
                 Зарегистрировать нового пользователя
                 </span>                
            </div>
        </div>
_EOT;
}
?>