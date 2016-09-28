<?php
session_start();
ob_start() ;



$user = 'zac21261';
$pass = 'Zachary.21261';
$db = 'grade_app';

mysql_connect("affinityposcom.ipagemysql.com", $user , $pass) or die ("Unable to connect");
mysql_select_db($db);

/*
$user = 'root';
$pass = '';
$db = 'grade_app';

mysql_connect("localhost", $user , $pass) or die ("Unable to connect");
mysql_select_db($db);

*/
include "func/user.func.php";
include "func/course.func.php";


?>
