<?php
session_start();
error_reporting(0);
require 'get_vars.php';
?>
	<!DOCTYPE html>
			<html>
			<head>
			<meta charset="UTF-8">
			<title><?php echo 'Welcome ' . $_SESSION['name'] . '!'; ?></title>
			<link rel="stylesheet" type="text/css" href="../css/default.css">
			</head>
			<body>
<?php
// Try and connect using the info above.
$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if (!mysqli_set_charset($con, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($con));
    exit();
} else {
    printf("Current character set: %s\n", mysqli_character_set_name($con));
}




if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}


// Now we check if the data was submitted, isset will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {

	// Could not get the data that should have been sent.

	die ('Username and/or password does not exist!');
}
// Prepare our SQL 
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute(); 
	$stmt->store_result(); 
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();      
		// Account exists, now we verify the password.
		if (password_verify($_POST['password'], $password)) {
			// Verification success! User has loggedin!
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
			if ($_SESSION['loggedin'] == TRUE)
			{
			//require 'get_vars.php';	  
			require 'admin/index.php';	  
			}	
		} else {
			echo 'Incorrect username and/or password!';
		}
	} else {
		echo 'Incorrect username and/or password!';
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement!';
}

?>