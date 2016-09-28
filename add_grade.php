<?php
include "init.php";
include "template/header.php";
include "widgets/assignments_menu.php";

echo '<div class="add_assignment">';

if(isset($_POST['title'], $_POST['points'], $_POST['points_possible'])) {

  $title = $_POST['title'];
  $points = $_POST['points'];
  $points_possible = $_POST['points_possible'];

  $errors = array();

  if(empty($title)) {
    $errors[] = "<font color='red'>Fill in all fields</font>";
  }
  if(!is_numeric($points) || !is_numeric($points_possible)){
    $errors[] = "<font color='red'>points must be numbers</font>";
  } else {
    if($points < 0 || $points_possible < 0){
      $errors[] = "<font color='red'>points must be 0 or greater</font>";

    }
  }

  if(!empty($errors)) {
    foreach($errors as $error) {
      echo $error.'<br>';
    }
  } else {
    $user_id = $_SESSION['user_id'];
    $course_id = $_GET['a_id'];
    mysql_query("INSERT INTO `assignments` VALUES('', '$user_id', '$course_id', '$title', '$points', '$points_possible')");
    header("Location: assignments.php?a_id=".$course_id."");
  }


} // end if isset
?>


  <form action="" method="post">
    Assignment Title:
    <br>
    <input type="text" name="title" autocomplete="off">
    <br>
    Points earned:
    <br>
    <input type="text" name="points" autocomplete="off">
    <br>
    Points Possible
    <br>
    <input type="text" name="points_possible" autocomplete="off">
    <br>
    <input type="submit" value="Submit" id="login_submit">
  </form>
</div>



<?php




include "template/footer.php";


 ?>
