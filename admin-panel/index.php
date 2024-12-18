<?php 
require 'layouts/header.php';
require '../config/config.php';
if(!isset($_SESSION['adminname'])){
  header("Location: http://localhost/other%20repos/HotelBooking/admin-panel/admins/login-admins.php");
}
  $hotels="SELECT count(*) AS count_hotels FROM hotels";
  $stmt=$PDO->prepare($hotels);
  $stmt->execute();
  $res=$stmt->fetch(PDO::FETCH_OBJ);

  $rooms="SELECT count(*) AS count_rooms FROM rooms";
  $stmt2=$PDO->prepare($rooms);
  $stmt2->execute();
  $res2=$stmt2->fetch(PDO::FETCH_OBJ);

  $admins="SELECT count(*) AS count_admins FROM admins";
  $stmt3=$PDO->prepare($admins);
  $stmt3->execute();
  $res3=$stmt3->fetch(PDO::FETCH_OBJ);

  $booking_count="SELECT count(*) AS count_bookings FROM bookings";
  $stmt4=$PDO->prepare($booking_count);
  $stmt4->execute();
  $res4=$stmt4->fetch(PDO::FETCH_OBJ);
?>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Hotels</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of hotels: <?php echo $res->count_hotels?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Rooms</h5>
              
              <p class="card-text">number of rooms: <?php echo $res2->count_rooms?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $res3->count_admins?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bookings</h5>
              
              <p class="card-text">number of admins: <?php echo $res4->count_bookings?></p>
              
            </div>
          </div>
        </div>
      </div>
<?php require 'layouts/footer.php';?>
