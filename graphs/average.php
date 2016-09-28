<?php

include "../init.php";


	$course_id = $_GET['a_id'];
  $user_id = $_SESSION['user_id'];


	$grades = mysql_query("SELECT *, SUM(`points`) as `points`,  SUM(`points_possible`) as `points_possible` FROM `assignments` WHERE `user_id` = '$user_id' AND `course_id` = '$course_id' GROUP BY `assignment_id`");

	$json = array();

 	while($grade = mysql_fetch_assoc($grades)) {
   	  $json[] = $grade;
 	}

    header('Content-Type: application/json');
    echo json_encode($json);

?>
