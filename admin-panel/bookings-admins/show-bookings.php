<?php
require '../../config/config.php';
require '../layouts/header.php';

if(!isset($_SESSION['adminname'])){
  echo "<script>window.location.href='$ADMINURL'/admins/login-admins.php</script>";
}else{
$bookings="SELECT * FROM bookings";
$stmt=$PDO->prepare($bookings);
$stmt->execute();

$bookings=$stmt->fetchAll(PDO::FETCH_OBJ);
}
?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Bookings</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">check in</th>
                    <th scope="col">check out</th>
                    <th scope="col">email</th>
                    <th scope="col">phone number</th>
                    <th scope="col">full name</th>
                    <th scope="col">hotel name</th>
                    <th scope="col">room name</th>
                    <th scope="col">created at</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($bookings as $book):?>
                  <tr>
                    <th scope="row"><?php echo $book->id?></th>
                    <td><?php echo $book->check_in?></td>
                    <td>7/4/<?php echo $book->check_out?></td>
                    <td><?php echo $book->email?></td>
                    <td><?php echo $book->phone_number?></td>
                    <td><?php echo $book->full_name?></td>
                    <td><?php echo $book->hotel_name?></td>
                    <td><?php echo $book->room_name?></td>
                    <td><?php echo $book->created_at?></td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table> 
<?php require '../layouts/footer.php';?>