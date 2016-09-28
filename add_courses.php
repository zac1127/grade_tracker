<?php
include "init.php";
include "template/header.php";
include "widgets/course_menu.php";

echo '<div class="add_assignment">';

if(isset($_POST['title'])) {

  $title = $_POST['title'];


  $errors = array();

  if(empty($title)) {
    $errors[] = "<font color='red'>Fill in all fields</font>";
  }

  if(!empty($errors)) {
    foreach($errors as $error) {
      echo $error.'<br>';
    }
  } else {
    $user_id = $_SESSION['user_id'];
    mysql_query("INSERT INTO `course` VALUES('', '$user_id','$title')");
    header("Location: courses.php");
  }


} // end if isset
?>


  <form action="" method="post">
    Course Title
    <br>
    <input type="text" name="title" autocomplete="off">
    <br>
    <input type="submit" value="Submit" id="login_submit">
  </form>
</div>



<?php




include "template/footer.php";


 ?>
