<?php
require_once '../config/config.php';
if(isset($_GET['id'])){	
	$id=$_GET['id'];
	$result = mysqli_query("SELECT * FROM room WHERE roomNo = $id");

while($row = mysqli_fetch_array($result))
extract($row);
  {
         if ($roomImage) {
			$image = WEB_ROOT . 'admin/room/' . $roomImage;
                }
                        else {
			$image = WEB_ROOT . 'admin/room/no-image-small.png';
		}
  echo "<img width=300 height=300 alt='Unable to View' src='" .$image."'>";
  }
}
?>
			
			
