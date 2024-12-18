<?php 
require '../layouts/header.php';
require '../../config/config.php';
if(isset($_SESSION['adminname'])){
  echo "<script>window.location.href='$ADMINURL'/admins/login-admins.php</script>";
}
$getAllHotels="SELECT * FROM hotels";
$stmt2=$PDO->prepare($getAllHotels);
$stmt2->execute();
$res=$stmt2->fetchAll(PDO::FETCH_OBJ);
 if(isset($_POST['submit'])){
  if (empty($_POST['name']) || 
      empty($_FILES['image']) || 
      empty($_POST['num_persons']) || 
      empty($_POST['num_beds']) || 
      empty($_POST['size']) || 
      empty($_POST['view']) || 
      empty($_POST['hotel_name'])){
    echo "<script>alert('One or more inputs are empty')</script>";
} else {
    $name = $_POST['name'];
    $hotName=$_POST['hotel_name'];
    $num_persons = $_POST['num_persons'];
    $num_beds = $_POST['num_beds'];
    $size=$_POST['size'];
    $view=$_POST['view']; 
    $image = $_FILES['image']['name'];
    $fetchHId = "SELECT id from hotels WHERE name='$hotName'";
    $stmt = $PDO->prepare($fetchHId);
    $stmt->execute();
    $res=$stmt->fetch(PDO::FETCH_ASSOC);
    $hId=$res['id'];
    $dir = __DIR__ . "/room_images/" . basename($image);
    if (!file_exists('room_images')) {
        mkdir('room_images', 0777, true); // Create the directory if it doesn't exist
    }

    $insert = "INSERT INTO rooms 
    (name, num_persons, num_beds, size, view, hotel_name, hotel_id, image) VALUES 
    ('$name', '$num_persons', '$num_beds', '$size','$view','$hotName','$hId','$image')";
    $stmt = $PDO->prepare($insert);
    $stmt->execute();

    if (move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
        header("Location: show-rooms.php");
    } else {
        echo "<script>alert('Failed to upload the image')</script>";
    }
}
 }
?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Rooms</h5>
          <form method="POST" action="create-rooms.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control" />
                 
                </div>  
                 <div class="form-outline mb-4 mt-4">
                  <input type="text" name="num_persons" id="form2Example1" class="form-control" placeholder="num_persons" />
                 
                </div> 
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="num_beds" id="form2Example1" class="form-control" placeholder="num_beds" />
                 
                </div> 
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="size" id="form2Example1" class="form-control" placeholder="size" />
                 
                </div> 
               <div class="form-outline mb-4 mt-4">
                <input type="text" name="view" id="form2Example1" class="form-control" placeholder="view" />
               
               </div> 
               <select name="hotel_name" class="form-control">
                <?php foreach($res as $h):?>
                <option value="<?php echo $h->name?>"><?php echo $h->name?></option>
                <?php endforeach;?>
               </select>
               <br>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>
<?php require '../layouts/footer.php';?>