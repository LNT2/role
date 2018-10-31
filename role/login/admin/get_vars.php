<?php
$id=$_GET['id'];
$update=$_POST['update'];
$insert=$_POST['insert'];
$delete_id=$_POST['delete_id'];
$update_id=$_POST['update_id'];
$update_first_name=$_POST['first_name'];
$update_last_name=$_POST['last_name'];
$limit_1=$_POST['limit_1'];
$limit_2=$_POST['limit_2'];
if (isset($limit_1)){
	$limit_1 = $limit_1 + 10;
} else {
$limit_1 = 0;
}
if (isset($limit_2)){
	$limit_2= $limit_2 - 10;
	$limit_1 = $limit_2;
} else {
$limit_2 = 0;
}
$limit_3 = 10;
$link = $_GET['link'];
	switch ($link) {
    case 1:
		$code_example = " Select";
        break;
    case 2:
		$code_example = " Update";
        break;
    case 3:
		$code_example = " Insert";
        break;
    case 4:
    	$code_example = " Delete";
        break;	
    case 5:
		$code_example = " Connect";
        break;		
}
$update_message='No action taken';
if (isset($delete_id)){
	require 'connect.php';
	try{
    $query = $pdo->prepare("delete from address_book where id = :id");
	$query->execute(array(
    ':id' => $delete_id
    ));
    $update_message =  "Data successfully deleted in the database table id: ".$delete_id;
    }catch(PDOException $e){
    $update_message =  "Failed to delete the MySQL database table ... :".$e->getMessage();
    }
}
if (isset($update)){
	require 'connect.php';
	    try{
    $query = $pdo->prepare("update address_book set first_name = :first_name, last_name = :last_name where id = :id");
    $data = array(
	':id' => $update_id,
    ':first_name' => $update_first_name,
	':last_name' => $update_last_name
    );
    $query->execute($data);
    $update_message = "Data successfully updated into the database table id: ".$id;
    }catch(PDOException $e){
    $update_message =  "Error! failed to update into the database table ... :".$e->getMessage();
    }
}
if (isset($insert)){
	require 'connect.php';
    try{
    $query = $pdo->prepare("insert into address_book (first_name,last_name,country)
    values (:first_name,:last_name,:country)");
    $data = array(
    ':first_name' => $update_first_name,
    ':last_name' => $update_last_name,
    ':country' => 'Land'
    );
    $query->execute($data);
    $update_message =  "Data successfully inserted into the database table: ".$update_first_name." ".$update_last_name;
    }catch(PDOException $e){
    $update_message =  "Error! failed to insert into the database table :".$e->getMessage();
}
}
?>
