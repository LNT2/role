<!DOCTYPE html>
<html>
<body>
<form name="form" action="update.php" method="POST">
<input type="radio" name="operation" value="insert">insert
<input type="radio" name="operation" value="update">update
<input type="radio" name="operation" value="delete">delete
<input type="submit" value="Submit now">
</form>
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
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			$sql = "UPDATE post SET text='TEXT replaced'";
			
			if ($conn->query($sql) === TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
			$conn->close();
        break;
	
	    case "insert":
				try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				// set the PDO error mode to exception
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				// prepare sql and bind parameters
				$stmt = $conn->prepare("INSERT INTO post (text, header, code, image, alt, menu_id) 
				VALUES (:text, :header, :code, :image, :alt, :menu_id)");
				$stmt->bindParam(':text', $text);
				$stmt->bindParam(':header', $header);
				$stmt->bindParam(':code', $code);
				$stmt->bindParam(':image', $image);
				$stmt->bindParam(':alt', $alt);
				$stmt->bindParam(':menu_id', $menu_id);
			
				// insert a row
				$header = "header";
				$code = "code";
				$text = "text";
				$image = "image";
				$alt = "alt";
				$menu_id = 1;
				$stmt->execute();
			
							
				echo "New records created successfully";
				}
			catch(PDOException $e)
				{
				echo "Error: " . $e->getMessage();
				}
			$conn = null;

        break;
		
		
		case "delete":
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			// sql to delete a record
			//$sql = "DELETE FROM post WHERE id=3";
			$sql = "DELETE FROM post";
			if ($conn->query($sql) === TRUE) {
				echo "Record deleted successfully";
			} else {
				echo "Error deleting record: " . $conn->error;
			}
			
			$conn->close();
		break;
    default:

		break;
		
}
echo "<table style='border: solid 1px black;'>";
class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>". parent::current(). "</td>";
    }

    function beginChildren() { 
        echo '<tr><td><td>'; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
}
         try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $conn->prepare("SELECT id, text, header, code, image, alt, menu_id FROM post"); 
				$stmt->execute();
			
				// set the resulting array to associative
				$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
			    /*	while ($row = $stmt->fetch()){
						echo  $row[0] . " | " . $row[1] . " | " . $row[2] . "<br/>"; 
                } Jag misstänker att denna bortkommenterade version är mer användbar för dig */
				/* Annars är den nedan bra också */
				foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
					echo $v; 
				}
			}
			catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
			$conn = null;
			echo "</table>";



			
			
			
			
			?> 
</body>
</html>