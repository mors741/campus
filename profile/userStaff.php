<?php

if ($user_data['role'] == 'admin' || $user_data['role'] == 'moder' || $user_data['role'] == 'manage' || $user_data['role'] == 'staff') {
    echo '<div role="tabpanel" class="tab-pane" id="staff">';
    if ($user_data['role'] == 'admin' or $user_data['role'] == 'manage' or $user_data['role'] == 'moder') {
        echo "<h3><strong>Все заявки на услуги</strong></h3><br/>";
        $check_query = "SELECT count(id) as count,
                (SELECT CONCAT(name,\" \", surname) FROM users WHERE id = owner) as author,
                                        (SELECT name FROM service WHERE id = serv) as category,
                                        (SELECT CONCAT(city,\" \", street,\" \", house,\", комната \", room)
                                            FROM address, users
                                            WHERE users.id = owner AND home = address.id) as address,
                                        (SELECT CONCAT(name,\" \", surname)
                                            FROM staff, users
                                            WHERE orders.performer = staff.id and staff.uid = users.id) as performer
                                        FROM orders
                                        ORDER BY date_create DESC"
                or die("Ошибка при выполнении запроса.." . mysqli_error($link));
        $result = $link->query($check_query);
        $ord_data = mysqli_fetch_array($result);
        if ($ord_data['count'] == 0) {
            echo "Нет заявок";
        } else {
            $query = "SELECT id, /*owner, performer,*/ description, serv, ordate, timeint, state, date_create,
                                        (SELECT CONCAT(name,\" \", surname) FROM users WHERE id = owner) as author,
                                        (SELECT name FROM service WHERE id = serv) as category,
                                        (SELECT CONCAT(city,\" \", street,\" \", house,\", комната \", room)
                                            FROM address, users
                                            WHERE users.id = owner AND home = address.id) as address,
                                        (SELECT CONCAT(name,\" \", surname)
                                            FROM staff, users
                                            WHERE orders.performer = staff.id and staff.uid = users.id) as performer
                                        FROM orders
                                        ORDER BY date_create DESC"
                    or die("Ошибка при выполнении запроса.." . mysqli_error($link));
        }
    }
    if ($user_data['role'] == 'staff') {
        echo "<h3><strong>Заявки для выполнения</strong></h3><br/>";
        $check_query = "SELECT count(orders.id) as count,
                                        (SELECT CONCAT(name,\" \", surname) FROM users WHERE id = owner) as author,
                                        (SELECT name FROM service WHERE id = serv) as category,
                                        (SELECT CONCAT(city,\" \", street,\" \", house,\", комната \", room)
                                            FROM address, users
                                            WHERE users.id = owner AND home = address.id) as address,
                                        (SELECT CONCAT(name,\" \", surname)
                                            FROM staff, users
                                            WHERE orders.performer = staff.id and staff.uid = users.id) as performer
                                        FROM orders, staff, users
                                        WHERE  orders.performer = staff.id and staff.uid = users.id and users.id = " . $user_data['id'] . "
                                        ORDER BY date_create DESC"
                or die("Ошибка при выполнении запроса.." . mysqli_error($link));
        $result = $link->query($check_query);
        $ord_data = mysqli_fetch_array($result);
        if ($ord_data['count'] == 0) {
            echo "Нет заявок";
        } else {
            $query = "SELECT orders.id as id, /*owner, performer,*/ description, serv, ordate, timeint, state, date_create,
                                            (SELECT CONCAT(name,\" \", surname) FROM users WHERE id = owner) as author,
                                            (SELECT name FROM service WHERE id = serv) as category,
                                            (SELECT CONCAT(city,\" \", street,\" \", house,\", комната \", room)
                                                FROM address, users
                                                WHERE users.id = owner AND home = address.id) as address,
                                            (SELECT CONCAT(name,\" \", surname)
                                                FROM staff, users
                                                WHERE orders.performer = staff.id and staff.uid = users.id) as performer
                                            FROM orders, staff, users
                                            WHERE  orders.performer = staff.id and staff.uid = users.id and users.id = " . $user_data['id'] . "
                                            ORDER BY date_create DESC"
                    or die("Ошибка при выполнении запроса.." . mysqli_error($link));
        }
    }
    if ($ord_data['count'] != 0) {
        $result = $link->query($query);
        $ord_data = mysqli_fetch_array($result);
        echo ('<div id="content">');
        $timeint = "";
        switch ($ord_data['timeint']) {
            case 1: $timeint = "9:00-9:45";
                break;
            case 2: $timeint = "10:00-10:45";
                break;
            case 3: $timeint = "11:00-11:45";
                break;
            case 4: $timeint = "12:00-10:45";
                break;
            case 5: $timeint = "14:00-14:45";
                break;
            case 6: $timeint = "15:00-15:45";
                break;
            case 7: $timeint = "16:00-16:45";
                break;
            case 8: $timeint = "17:00-17:45";
                break;
        }
        echo('<table id="grid-basic2" class="table table-hover table-responsive table-bordered" width="100%">');
        echo('
        <thead>
        <th data-visible="false" data-column-id="id"><strong>id</strong></th>
        <th rowspan="3" data-column-id="category"><strong>Категория</strong></th>
        <th rowspan="3" data-column-id="description"><strong>Описание</strong></th>
        <th rowspan="3" data-column-id="ordate"><strong>Дата и &shy; время &shy; обслужи&shy;вания</strong></th>
        <th  rowspan="3" data-column-id="address"><strong>Адрес</strong></th>
        <th rowspan="3" data-column-id="author"><strong>Автор заявки</strong></th>
        <th rowspan="3" data-column-id="date_create"><strong>Дата и &shy; время &shy; добавле&shy;ния заявки</strong></th>
        <th rowspan="3" data-column-id="state"><strong>Состояние заказа</strong> </th>
        <th rowspan="3" data-column-id="performer"><strong>Исполни&shy;тель заказа</strong></th>
        <th rowspan="3" data-column-id="commands" data-formatter="commands" data-sortable="false">Действия</th>
        </thead>');
        do {
             echo ('<div class="content">

        <tr id=\"' . $ord_data["id"] . '\" >
            <td><p>' . $ord_data['id'] . "</p></td>
            <td >"
            . "<p>" . $ord_data['category'] . "</p></td>
            <td>"
            . "<p>" . $ord_data['description'] . "</p></td>
            <td>"
            . "<p>" . $ord_data['ordate'] . " " . $timeint . "</p></td>
            <td>"
            . "<p>" . $ord_data['address'] . "</p></td>
            <td>"
            . "<p>" . $ord_data['author'] . "</p></td>
            <td>"
            . "<p>" . $ord_data['date_create'] . "</p></td>
            <td>"
            . "<p>" . $ord_data['state'] . "</p></td>
			<td>"
            . "<p>" . $ord_data['performer'] . "</p></td>
        </tr>"


            );
            //echo ('<a href="services.php?inv='.$ord_data['id'].'" class="button danger" style="text-align:center;">Удалить</a><br><br>');
            echo ('</div>');
        } while ($ord_data = mysqli_fetch_array($result));

        echo('</table>');
        if ($user_data['role'] == 'admin' or $user_data['role'] == 'manage' or $user_data['role'] == 'moder') {
            echo('
                                    <form action="staff.php">
                                        <input type="submit" class = "btn btn-default" value="Рейтинг персонала">
                                    </form>');
        }
        echo ('</div>');
    }
    echo '</div>';
}
?>
					