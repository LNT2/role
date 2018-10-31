<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHP and MySql</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php 
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'humble';
$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);


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
/* As you can see we can start the php execution just by adding the tag "<?php " */
error_reporting(0); /* No error messages are displayed in the browser */
require 'get_vars.php'; /* open and includes this file for execution, not that with require instead of include, which basically does the same thing, the execution of index.php stops as opposed to include where the rest of the code is executed  */
if (isset ($id)) {
	 require 'select_single.php'; /* open and includes this file for execution if the varible "$id" has a value */
} 
?>
<div class="banner">
<h1>Hello <img class="logo" src="images/php.png" alt="PHP" title="PHP"> and <img class="logo" src="images/mysql.png" alt="MySql" title="MySql"></h1>
</div>
<p></p>
<div class="menu_container">
  <div class="menu">
	<a href="index.php">Start</a>
  	<a href="index.php?link=5">Connect</a>
    <a href="index.php?link=1">Select</a>
    <a href="index.php?link=2">Update</a>
    <a href="index.php?link=3">Insert</a>
	<a href="index.php?link=4">Delete</a>
	<p></p>
  </div>
  <form action="index.php" method="POST">
  <input type="text" name="username" value="<?php echo $_POST['username'] ?>">
  <input type="text" name="password" value="<?php echo $_POST['password'] ?>">
	<div class="main">
	 <div class="table_container">
		<table id="customers">
			<tbody>
				<tr>
					<?php if (!isset ($id)){ ?>
						<th>Edit</th>
						<th>scene_name        </th>
						<th>scene_link_1      </th>
						<th>scene_link_2      </th>
						<th>scene_link_1_txt  </th>
						<th>scene_link_2_txt  </th>
						<th>scene_back        </th>
						<th>scene_text        </th>
						<th>Delete</th>
						
						
				</tr>
					<?php
						} else {?>
						<th>Editor</th>
						
				</tr>	
	<?php }
	 require 'select.php';
    ?>	
	
	 </div>
	 <p><input type="submit" name="limit_1" value="<?php echo $limit_1; ?>"><input type="submit" name="limit_2" value="<?php echo $limit_2; ?>"></p>
	</div>
    <div class="right">
		<h4>Action</h4>
		<input type ="text" placeholder="Scene Name" rows="1" name="scene_name" value="<?php echo $scene_name; ?>">
		<p></p>
		
		<p></p>
		<input type="text" name="update_id" value="<?php echo $id; ?>">
		<input class="button" type="submit" name="update" value="Update">
		<p></p>
		<input class="button" type="submit" name="insert" value="Create new">
		<p><?php echo $update_message ?></p>
	</div>
  </form>
</div>
<p></p>
<footer>© Lasse liten blues</footer>
</body>
</html>
<?php 
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