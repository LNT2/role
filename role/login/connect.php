<?php
$link = mysqli_connect("localhost","root","","humble") or die("Error " . mysqli_error($link)); 
if (!mysqli_set_charset($link, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($link));
    exit();
} else {
    printf("Current character set: %s\n", mysqli_character_set_name($link));
}

?>