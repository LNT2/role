<?php
require 'connect.php';

if ($result = mysqli_query($link, "SELECT * FROM `post`")) {
    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result);
	
    /* close result set */
    mysqli_free_result($result);
	//echo 'nr:'.$row_cnt;
}
$query_id_high ="SELECT * FROM `post` order by id";
$result_id_high = mysqli_query($link,$query_id_high); 
while($row = mysqli_fetch_array($result_id_high)) { 
$high_id =$row["id"];
}
$query_id_low ="SELECT * FROM `post` order by id desc";
$result_id_low = mysqli_query($link,$query_id_low); 
while($row = mysqli_fetch_array($result_id_low)) { 
$low_id =$row["id"];
}
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'humble';
//echo 'hi'.$high_id;
//echo 'li'.$low_id;
for ($i = $low_id; $i <= $high_id; $i++) 
{
	$name = $i;
    $id_to_edit = $_POST[$name];
	   if (isset ($id_to_edit))
	   {
		$query_id_to_edit ="SELECT * FROM `post` WHERE id=$id_to_edit";
		$result_id_to_edit = mysqli_query($link,$query_id_to_edit); 
		while($row = mysqli_fetch_array($result_id_to_edit)) { 
		$id_d = $row[id] ; 
		$text_d = $row[text] ; 
		$header_d = $row[header] ;  
		$code_d = $row[code] ;
		$image_d = $row[image];
		$alt_d = $row[alt];
		$menu_id_d = $row[menu_id];
		$check_update = 'checked';
		}
	   }
}
$query_menu ="SELECT * FROM `menu` order by course";
$result_menu = mysqli_query($link,$query_menu); 
while($row = mysqli_fetch_array($result_menu)) { 
$course = $row["course"];
$value = $row["id"];
if ($menu_id_d == $value )
{
	$selected ='selected';
} else
{
	$selected ='';
}
/*<option value="audi" selected>Audi</option>*/
$s = $s.'<option value="'.$value.'"  '.$selected.'>'.$course.'</option>';

}

 
  






/*
echo '$text;'. $text; 
echo '$date;'. $date; 
echo '$time;'. $time; 
echo '$update;'.$update;
echo '$delete;'.$delete;
echo '$edit;'. $edit; */
?>