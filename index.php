<?php
include 'init.php';
include 'template/header.php';

if (logged_in()) {
    header('Location: courses.php');
}

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = login_check($username, $password);
    $errors = array();

    if (empty($username) || empty($password)) {
        $errors[] = '
    <script type="text/javascript">
	    <!--
	    alert("Please Enter A Email/Username And Password");
	    //-->
    </script>';
    } else {
        if ($login === false) {
            $errors[] = '
        <script type="text/javascript">
	        <!--
	        alert("Email/Username or Password did not match our records!");
			//-->
        </script>';
        }
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error, '<br />';
        } // end foreach loop
    } else {
        $_SESSION['user_id'] = $login;
        header('Location: courses.php');
        exit();
    } // end if empty errors
} // if isset

?>


<div class="login">
  <center><span style="font-size: 40px; color: white; margin-bottom: 15px;">GradeManager</span></center>
  <form action="" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Login" id="login_submit">
  <form>
</div>


<?php


include 'template/footer.php';

 ?>
