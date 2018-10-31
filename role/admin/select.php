<?php
if (!isset ($id)){
echo '<tr>';
require 'connect.php';
$query = $pdo->prepare("select * from scenes order by scene_id LIMIT $limit_1, $limit_3");
$query->execute();
while($scenes = $query->fetch()){
echo '<td class="small"><input class="button3" type="submit" value="'.$scenes['id'].'" name="id"></td>';
echo '<td>'.$scenes['scene_name'].'</td>';
echo '<td>'.$scenes['scene_link_1'].'</td>';
echo '<td>'.$scenes['scene_link_2'].'</td>';
echo '<td>'.$scenes['scene_link_1_txt'].'</td>';
echo '<td>'.$scenes['scene_link_2_txt'].'</td>';
echo '<td>'.$scenes['scene_back'].'</td>';
echo '<td>'.$scenes['scene_text'].'</td>';
echo '<td class="small"><input class="button2" type="submit" value="'.$scenes['id'].'" name="delete_id"></td>';
echo '</tr>';
}
} else{
	

	echo '<td><input type ="text" placeholder="Scene Text" rows="1" name="scene_text" value="'.$scene_text.'"></td></tr>';
}

?>
</tbody>
</table>