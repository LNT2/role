<?php
require 'connect.php';
$query_single = $pdo->prepare("select * from address_book where id=$id");
$query_single->execute();
while($address_book = $query_single->fetch()){
$first_name = $address_book['first_name'];
$last_name = $address_book['last_name'];
}
$update_message = $first_name.' '.$last_name.' selected';
?>