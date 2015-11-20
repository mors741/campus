<?php

if ($user_data['role'] == 'admin' || $user_data['role'] == 'moder' || $user_data['role'] == 'manage' || $user_data['role'] == 'staff') {
    echo '<div role="tabpanel" class="tab-pane" id="staff">';
    echo ('<div id="content">');
    echo '</div>';
    echo '</div>';
}
?>