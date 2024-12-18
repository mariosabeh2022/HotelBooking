<?php 
require '../includes/header.php';
require '../config/config.php';
if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='".$APPURL."'</script>";
}
if(isset($_GET['id'])){
    $id=$_GET['id'];
    if($_SESSION['id']!=$id){
        echo "<script>window.location.href='".$APPURL."'</script>";
    }
    $bookings="SELECT * FROM bookings WHERE user_id='$id'";
    $stmt=$PDO->prepare($bookings);
    $stmt->execute();
    $res=$stmt->fetchAll(PDO::FETCH_OBJ);
}
else{
    echo "<script>window.location.href='".$APPURL."/404.php'</script>";
}
?>
<div class="container">
    <br>
    <?php
        if(count($res)>0) :
    ?>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Check In</th>
            <th scope="col">Check Out</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Full Name</th>
            <th scope="col">Room Name</th>
            <th scope="col">Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($res as $booking):?>
            <tr>
            <th scope="row">-</th>
            <td><?php echo $booking->check_in?></td>
            <td><?php echo $booking->check_out?></td>
            <td><?php echo $booking->email?></td>
            <td><?php echo $booking->phone_number?></td>
            <td><?php echo $booking->full_name?></td>
            <td><?php echo $booking->room_name?></td>
            <td><?php echo $booking->created_at?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
<br>
<?php else: ?>
    <div class="alert alert-primary" role="alert">
        You haven't made any bookings yet
    </div>
<?php endif;?>
</div>

<?php require '../includes/footer.php';?>