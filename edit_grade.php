<?php
include "init.php";
include "template/header.php";
include "widgets/assignments_menu.php";

echo '<div class="add_assignment">';
$assignment_id = $_GET['a_id'];
$return_id = $_GET['pa_id'];
$user_id = $_SESSION['user_id'];
if(isset($_POST['title'], $_POST['points'], $_POST['points_possible'])) {

  $title = $_POST['title'];
  $points = $_POST['points'];
  $points_possible = $_POST['points_possible'];

  $errors = array();

  if(empty($title)) {
    $errors[] = "<font color='red'>Fill in all fields</font>";
  }
  if(!is_numeric($points) || !is_numeric($points_possible)){
    $errors[] = "<font color='red'>Points must be numbers</font>";
  } else {
    if($points < 0 || $points_possible < 0){
      $errors[] = "<font color='red'>Points must be 0 or greater</font>";

    }
  }

  if(!empty($errors)) {
    foreach($errors as $error) {
      echo $error.'<br>';
    }
  } else {

    mysql_query("UPDATE `assignments` SET `assignment_name` = '$title' WHERE `user_id` = '$user_id' AND `assignment_id` = '$assignment_id'");
    mysql_query("UPDATE `assignments` SET `points` = '$points' WHERE `user_id` = '$user_id' AND `assignment_id` = '$assignment_id'");
    mysql_query("UPDATE `assignments` SET `points_possible` = '$points_possible' WHERE `user_id` = '$user_id' AND `assignment_id` = '$assignment_id'");
    header("Location: assignments.php?a_id=".$return_id."");
  }


} // end if isset

$values = mysql_query("SELECT * FROM `assignments` WHERE `assignment_id` = '$assignment_id' AND `user_id` = '$user_id'");
while($value = mysql_fetch_assoc($values)) {
echo '
  <form action="" method="post">
    Assignment Title:
    <br>
    <input type="text" name="title" autocomplete="off" value="'.$value['assignment_name'].'">
    <br>
    Points earned:
    <br>
    <input type="text" name="points" autocomplete="off" value="'.$value['points'].'">
    <br>
    Points Possible
    <br>
    <input type="text" name="points_possible" autocomplete="off" value="'.$value['points_possible'].'">
    <br>
    <input type="submit" value="Submit">
  </form>
</div>';
}






include "template/footer.php";


 ?>
