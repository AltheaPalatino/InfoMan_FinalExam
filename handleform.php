<?php  
session_start();
require_once('dbConfig.php');
require_once('functions.php');

// Check if registration button is pressed
if (isset($_POST['regBtn'])) {
	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	// Check for empty fields
	if(empty($username) || empty($password)) {
		echo '<script> 
		alert("The input field is empty!");
		window.location.href = "register.php";
		</script>';
	}
	
	else {

		// Attempt to add the user
		if(addUser($conn, $username, $password)) {
			header('Location: index.php');
		}

		// Redirect on failure
		else {
			header('Location: register.php');
		}

	}
}

// Check if login button is pressed
if (isset($_POST['loginBtn'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Check for empty fields
	if(empty($username) && empty($password)) {
		echo "<script>
		alert('Input fields are empty!');
		window.location.href='index.php'
		</script>";
	} 
	else {

		// Attempt to log the user in
		if(login($conn, $username, $password)) {
			header('Location: index.php');
		}

		else {
			header('Location: login.php');
		}
	}
	
}
?>
