<?php
require '../../config/config.php';
if(isset($_GET['id']))
  $id=$_GET['id'];

$hotels="SELECT * FROM hotels WHERE id='$id'";
$stmt=$PDO->prepare($hotels);
$stmt->execute();
$res=$stmt->fetch(PDO::FETCH_ASSOC);
unlink("C:/xampp/htdocs/Other repos/HotelBooking/admin-panel/hotels-admins/hotels_images/".$res['image']);

$hotels="DELETE FROM hotels WHERE id=$id";
$stmt=$PDO->prepare($hotels);
$stmt->execute();
header("location:show-hotels.php");
?>