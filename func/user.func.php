<?php

function logged_in() {
	return isset($_SESSION['user_id']);

}

function login_check($username, $password) {
  $username = mysql_real_escape_string($username);
  $login_query = mysql_query("SELECT COUNT(`user_id`) as `count`, `user_id` FROM `users` WHERE `username`='$username' AND `password`='".md5($password)."'");
  return (mysql_result($login_query, 0) == 1) ? mysql_result($login_query, 0, 'user_id') : false;
}

function user_data() {
  $query = mysql_query("SELECT * FROM `users` WHERE `user_id`=".$_SESSION['user_id']);
  	while($query_result = mysql_fetch_assoc($query)){
  		return $query_result;
  	} // END WHILE
}

function get_user_name($user_id) {
	$first_name = mysql_query("SELECT `first_name` FROM `users` WHERE `user_id`='$user_id'");
	$first_name = mysql_result($first_name, 0);
	$last_name = mysql_query("SELECT `last_name` FROM `users` WHERE `user_id`='$user_id'");
	$last_name = mysql_result($last_name, 0);

	return $first_name.' '.$last_name;
}

function user_exists($username) {
	$username = mysql_real_escape_string($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username`='$username'");
	return (mysql_result($query, 0) == 1) ? true : false;
}


?>
