<?php
session_start();

//error_reporting(0);

require 'database/connect.php';
require 'functions/admin.php';
require 'functions/users.php';
require 'functions/general.php';

if (logged_in() === true){

	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id', 'username', 'password', 'first_name', 'last_name', 'email');
	if (user_active($user_data['username']) === false)  {
		session_destroy();
		header('Location: index.php');
		exit();
	}
} 
if (admin_logged_in() === true){

	$session_admin_id = $_SESSION['admin_id'];
	$admin_data = admin_data($session_admin_id, 'admin_id', 'username', 'password', 'competence', 'MadeByP');
	if (admin_active($admin_data['username']) === false)  {
		session_destroy();
		header('Location: adminindex.php');
		exit();
	}
} 
$errors = array ();

?>