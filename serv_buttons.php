<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
if(!isset($_SESSION))
	session_start();
$q = intval($_GET['serv']);
$date = $_GET['date'];

$con = mysqli_connect('localhost','root','','campus');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"campus");
$sql=
"SELECT COUNT(*) AS staffcount
	FROM
		`area` AS A
		JOIN `staff` AS S
		ON A.staff_id = S.id
	WHERE
		S.sid = ".$q." AND
		A.address_id = (SELECT home FROM users WHERE login = '".$_SESSION['login']."');";
$result = mysqli_query($con,$sql);
$myrow = mysqli_fetch_array($result);
$staffcount = $myrow['staffcount'];
$result->close();
$sql=
"SELECT MAX(perfcount) AS perfcount, timeint FROM (
	SELECT
		COUNT(performer) AS perfcount,
		timeint
	FROM `orders`
	WHERE
		ordate = '".$date."'
	GROUP BY timeint

	UNION ALL

	SELECT 0 AS perfcount, 1 AS timeint
	UNION ALL
	SELECT 0 AS perfcount, 2 AS timeint
	UNION ALL
	SELECT 0 AS perfcount, 3 AS timeint
	UNION ALL
	SELECT 0 AS perfcount, 4 AS timeint
	UNION ALL
	SELECT 0 AS perfcount, 5 AS timeint
	UNION ALL
	SELECT 0 AS perfcount, 6 AS timeint
	UNION ALL
	SELECT 0 AS perfcount, 7 AS timeint
	UNION ALL
	SELECT 0 AS perfcount, 8 AS timeint
) AS t1
GROUP BY timeint
ORDER BY timeint";
$result1 = mysqli_query($con,$sql);
$active = false;
	while ($time_data=mysqli_fetch_array($result1)){
		$hour = $time_data['timeint'] + 8;
		echo '<label class="btn btn-custom gradient';
		if ($time_data['perfcount'] < $staffcount) {
			if (!$active) {
				echo ' active';
				$active = true;
			}
		} else {
			echo ' disabled';
		}
		echo '" style="width: 120px" >
			<input type="radio" name="options" id="'.$time_data["timeint"].'" autocomplete="off" onchange="document.getElementById(\'timeint\').setAttribute(\'value\', this.id)"> '.$hour.':00 - '.$hour.':45
		</label>';
	};
mysqli_close($con);
?>
</body>
</html>