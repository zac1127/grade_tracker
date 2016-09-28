<?php

include 'init.php';
include 'template/header.php';
include 'widgets/course_menu.php';

if (!logged_in()) {
    header('Location: index.php');
}

$courses = get_courses();
if (mysql_num_rows($courses) == 0) {
    echo '
    <div class="course">
      <center>No Courses Added</center>
    </div>
  ';
} else {
    while ($course = mysql_fetch_assoc($courses)) {
        echo '
    <a href="assignments.php?a_id='.$course['course_id'].'">
      <div class="course">
        <span class="course_name">'.$course['course_name'].'</span>
      </div>
    </a>
    ';
    }
}

echo "<div class='logout'><a href='logout.php'>Logout</a></div>";

include 'template/footer.php';
