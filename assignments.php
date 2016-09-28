<?php

include 'init.php';
include 'template/header.php';
include 'widgets/assignments_menu.php';
echo '
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.bundle.min.js"></script>
<script src="javascript/chart.js"></script>
';

if (!logged_in()) {
    header('Location: index.php');
}
if (!isset($_GET['a_id'])) {
    header('Location: index.php');
}

$user_id = $_SESSION['user_id'];
$course_id = $_GET['a_id'];
$course_average = 0;
$grades = mysql_query("SELECT *, SUM(`points`) as `points`,  SUM(`points_possible`) as `points_possible` FROM `assignments` WHERE `user_id` = '$user_id' AND `course_id` = '$course_id'");

$assignments = get_assignments();

if (mysql_num_rows($assignments) != 0) {
    while ($average = mysql_fetch_assoc($grades)) {
        if ($average['points_possible'] != 0) {
            $course_average = ($average['points'] / $average['points_possible']) * 100;
        }
    }

    $assignments = get_assignments();

    echo '<div class="class_stats">';
    echo get_course();
    echo money_format("<div class='average'> %!i ", $course_average).'% </div>';
    echo '

 <canvas id="average" style=" margin-bottom: 20px;"></canvas>



</div>';
} // end if assingment are added

if (mysql_num_rows($assignments) == 0) {
    echo '<div class="course">

  <center>No Grades Added</center>

  </div>';
} else {
    while ($assignment = mysql_fetch_assoc($assignments)) {
        echo '
    <a href="edit_grade.php?a_id='.$assignment['assignment_id'].'&pa_id='.$_GET['a_id'].'">
      <div class="course">

        <span class="assignment_name">'.$assignment['assignment_name'].'</span>

       <span class="points"> '.$assignment['points'].' / '.$assignment['points_possible'].'</span>

      </div>
    </a>
    ';
    }
}

include 'template/footer.php';
