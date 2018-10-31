<?php
require 'connect.php';
echo 'nr:'.$num_rows;
if ($result = mysqli_query($link, "SELECT * FROM `post`")) {
    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result);
    /* close result set */
    mysqli_free_result($result);
}

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'humble';



/*
echo '$text;'. $text; 
echo '$date;'. $date; 
echo '$time;'. $time; 
echo '$update;'.$update;
echo '$delete;'.$delete;
echo '$edit;'. $edit; */
?>