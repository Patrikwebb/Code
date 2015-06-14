<?php
function logged_in_redirect_page() {
	
		if (logged_in() === true){ 
			header('Location: index.php');
		} 		
}
function protect_page() {
	
		if (logged_in() === false){ 
			header('Location: protected.php');
		} 		
}
function logged_in() {
	
		if (isset($_SESSION['user_id'])){ 
			return true;
		} else 
			return false;
	
}
function user_exists ($username) {

        global $mysqli_pekare;
        $username = sanitize($username);
        $query = mysqli_query($mysqli_pekare, ("SELECT * FROM `users` WHERE `username` = '$username'"));
        $rowcount= mysqli_num_rows($query);
     
        if ($rowcount < 1) return false;

        return true;
}
function user_active ($username) {

        global $mysqli_pekare;
        $username = sanitize($username);
		$query = mysqli_query($mysqli_pekare, ("SELECT * FROM `users` WHERE `username` = '$username' AND `active` = 1"));
        $rowcount= mysqli_num_rows($query);
     
        if ($rowcount < 1) return false;
     
        return true;		   
}
function get_user_id_from_username($username){
	
		global $mysqli_pekare;
		$username = sanitize($username);	
		$result = mysqli_query($mysqli_pekare, ("SELECT `user_id` FROM `users` WHERE `username` = '$username'"));
		$user_id = mysqli_fetch_assoc($result);
		
        $rows= mysqli_num_rows($result);
		if ($rows < 1) return false;
		
		return $user_id;
		
}
function login($username, $password) {

		global $mysqli_pekare;
		$username = sanitize($username);
		$password = md5 ($password);
		$query = mysqli_query($mysqli_pekare, ("SELECT `user_id` FROM `users` WHERE `username` = '$username' AND `password` = '$password'"));
		$rowcount= mysqli_num_rows($query);
        if ($rowcount < 1) return false;
			
        return true;
}
function user_data($user_id) {

		global $mysqli_pekare;
		$data = array();
		$user_id = (int)$user_id['user_id'];
		
		$func_num_args = func_num_args();
		$func_get_args = func_get_args();

		if ($func_num_args > 1) {
			unset($func_get_args[0]);

			$fields = '`' . implode('`, `', $func_get_args) . '`';
			$sql = ("SELECT $fields FROM `users` WHERE `user_id` = $user_id");
			$result = mysqli_query($mysqli_pekare,$sql);
			$data = mysqli_fetch_assoc($result);
			return $data;
		}
}
function user_count(){

		global $mysqli_pekare;

		$sql = ("SELECT COUNT(`user_id`) AS counter FROM `users` WHERE `active` = 1");
		$result = mysqli_result(mysqli_query($sql));
	
		var_dump($result);
		echo $result;
		return $result;
}

/* Kolla SQL frågan
function user_count(){

		return mysqli_result(mysqli_query("SELECT COUNT(`user_id`) AS counter FROM `users` WHERE `active` = 1"), 0);
}
*/
?>