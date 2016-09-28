<?php

  function get_courses() {
    $user_id = $_SESSION['user_id'];
    $courses = mysql_query("SELECT * FROM `course` WHERE `user_id` = '$user_id'");
    return $courses;
  }

 function get_course() {
   $user_id = $_SESSION['user_id'];
   $courses = mysql_query("SELECT `course_name` FROM `course` WHERE `user_id` = '$user_id' AND `course_id` = '".$_GET['a_id']."'");
   return mysql_result($courses, 0);
 }

 function get_assignments() {
   $user_id = $_SESSION['user_id'];
   $course_id = $_GET['a_id'];
   $assignments = mysql_query("SELECT * FROM `assignments` WHERE `course_id` = '$course_id' AND `user_id` = '$user_id' ORDER BY `assignment_id` DESC");
   return $assignments;

 }




 ?>
