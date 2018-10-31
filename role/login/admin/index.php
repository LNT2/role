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
	<div class="main">
	 <div class="table_container">
		<table id="customers">
			<tbody>
				<tr>
					<?php if (!isset ($link)){ ?>
						<th>Edit</th>
						<th>First name</th>
						<th>Last name</th>
						<th>Delete</th>
				</tr>
					<?php
						} else {?>
						<th>Code example - <?php echo $code_example; ?></th>
				</tr>	
	<?php }
	 require 'select.php';
    ?>	
	
	 </div>
	 <p><input type="submit" name="limit_1" value="<?php echo $limit_1; ?>"><input type="submit" name="limit_2" value="<?php echo $limit_2; ?>"></p>
	</div>
    <div class="right">
		<h4>Action</h4>
		<input type ="text" placeholder="First Name" rows="1" name="first_name" value="<?php echo $first_name; ?>">
		<p></p>
		<input type ="text" placeholder="Last Name" rows="1" name="last_name" value="<?php echo $last_name; ?>">
		<p></p>
		<input type="hidden" name="update_id" value="<?php echo $id; ?>">
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