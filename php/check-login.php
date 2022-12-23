<?php  
session_start();
include "../db_conn.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	$role = test_input($_POST['role']);

	if (empty($username)) {
		header("Location: ../Login_index.php?error=User Name is Required");
	}else if (empty($password)) {
		header("Location: ../Login_index.php?error=Password is Required");
	}else {

		$_session['username'] =  $_POST['username'];
		$_session['password']=  $_POST['password'];
		$_session['role'] =  $_POST['role'];

 		// Hashing the password
		$password = md5($password);
        $sql = "SELECT * FROM trade WHERE username='$username' AND Apassword='$password' AND stutus='Approved'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1){
        	// the user name must be unique
        	$row = mysqli_fetch_assoc($result);
        	if ($row['Apassword'] == $password && $row['role'] == $role) {
        		$_SESSION['name'] = $row['name'];
        		$_SESSION['ID'] = $row['ID'];
        		$_SESSION['role'] = $row['role'];
        		$_SESSION['username'] = $row['username'];
        		$_SESSION['stutus'] = $row['stutus'];
				$_SESSION['Tin'] = $row['TinNo'];
        		//header("Location: ../Login_home.php");
				header("Location: ../Login_home.php");

        	}else {
        		header("Location: ../Login_index.php?error=Incorect UserName or password");
        	}
        }else {
        	header("Location: ../Login_index.php?error=Incorect UserName or password");
        }

	}
	
}else {
	header("Location: ../Login_index.php");
}?>