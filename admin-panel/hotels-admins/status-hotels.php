<?php
require '../../config/config.php';
require '../layouts/header.php';
if(isset($_GET['id'])){
  $id=$_GET['id'];
  if(isset($_POST['submit'])){
    if(isset($_POST['status'])){
    $status=$_POST['status'];
    $update="UPDATE hotels SET status='$status' WHERE id=$id";
    $stmt=$PDO->prepare($update);
    $stmt->execute();
    header("location:show-hotels.php");
  }
  else{
    echo "<script>window.location.href='$ADMINURL'/hotel-admins/show-hotels.php</script>";
    }
  }
}
$hotels="SELECT * FROM hotels";
$stmt=$PDO->prepare($hotels);
$stmt->execute();
?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline" >Update Status</h5>
          <form method="POST" action="status-hotels.php?id='<?php echo $id?>'" enctype="multipart/form-data">
                <select style="margin-top: 15px;" name="status" class="form-control">
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>
                <button style="margin-top: 10px;" type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>
          </form>
<?php require '../layouts/footer.php';?>