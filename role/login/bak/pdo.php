<?php
$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "humble";
				$operation = $_POST['operation'];
				
				
				if (!isset($operation)){
	$operation="default";
}
switch ($operation) {
   	case "update":
			$link = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($link->connect_error) {
				die("Connection failed: " . $link->connect_error);
			} 
			
			$sql = "UPDATE post SET text='TEXT replaced'";
			
			if ($link->query($sql) === TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $link->error;
			}
			$link->close();
        break;
	
	    case "insert":
				try {
				$link = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				// set the PDO error mode to exception
				$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				// prepare sql and bind parameters
				$stmt = $link->prepare("INSERT INTO post (text, header, code, image, alt, menu_id) 
				VALUES (:text, :header, :code, :image, :alt, :menu_id)");
				$stmt->bindParam(':text', $text);
				$stmt->bindParam(':header', $header);
				$stmt->bindParam(':code', $code);
				$stmt->bindParam(':image', $image);
				$stmt->bindParam(':alt', $alt);
				$stmt->bindParam(':menu_id', $menu_id);
			
				// insert a row
				$text = $_POST['text'];
				$header = $_POST['header'];
				$code = $_POST['code'];
				$image = $_POST['image'];
				$alt = $_POST['alt'];
				$menu_id = $_POST['menu_id'];
				$stmt->execute();
			
							
				echo "New records created successfully";
				}
			catch(PDOException $e)
				{
				echo "Error: " . $e->getMessage();
				}
			$link = null;

        break;
		
		
		case "delete":
			$link = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($link->connect_error) {
				die("Connection failed: " . $link->connect_error);
			} 
			
			// sql to delete a record
			//$sql = "DELETE FROM post WHERE id=3";
			$sql = "DELETE FROM post";
			if ($link->query($sql) === TRUE) {
				echo "Record deleted successfully";
			} else {
				echo "Error deleting record: " . $link->error;
			}
			
			$link->close();
		break;
    default:

		break;
		
}
echo "<table>";


         try {
				$link = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $link->prepare("SELECT id, text, header, code, image, alt, menu_id FROM post"); 
				$stmt->execute();
			     ?> 
				 <form action="authenticate.php" method="post" name="list">
				<table>
				 
				 <?php
				// set the resulting array to associative
				echo '<form name="list" method="post">';
				
				$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
			    	while ($row = $stmt->fetch()){
					
						 echo  
						 '<tr>
						 <td>
						 <input type="submit" name="'.$row['id'].'" value="'.$row['id'] . '"
						 </td>
						 <td>
						 <input type="text" name="text" value="'. $row['text'] . '"
						 </td>
						 <td>
						 <input type="text" name="header" value="'. $row['header'] .  '"
						 </td>
						 <td>
						 <input type="text" name="code" value="'. $row['code']. '"
						 </td>
						 <td>
						 <input type="text" name="image" value="'. $row['image'].'"
						 </td>
						 <td>
						 <input type="text" name="alt" value="'. $row['alt'].'"
						 </td>
						 <td>
						 <input type="number" name="menu_id" value="'. $row['menu_id'].'"
						 </td>
						 <tr/>'; 
                } 
				echo "</table>";
			}
			catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
			$link = null;
			echo "</table>";
			require 'form.html';
			require 'footer.php';
			?> 

            
			
 