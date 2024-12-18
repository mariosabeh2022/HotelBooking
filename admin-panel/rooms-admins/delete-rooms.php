<?php
require '../../config/config.php';
if(isset($_GET['id']))
  $id=$_GET['id'];

$hotels="SELECT * FROM rooms WHERE id='$id'";
$stmt=$PDO->prepare($hotels);
$stmt->execute();
$res=$stmt->fetch(PDO::FETCH_ASSOC);
unlink("C:/xampp/htdocs/Other repos/hotel-booking/admin-panel/rooms-admins/room_images/".$res['image']);

$hotels="DELETE FROM rooms WHERE id=$id";
$stmt=$PDO->prepare($hotels);
$stmt->execute();
header("location:show-rooms.php");
?>