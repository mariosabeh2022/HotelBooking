<?php 
require '../layouts/header.php';
require '../../config/config.php';
if(isset($_SESSION['adminname'])){
  echo "<script>window.location.href='$ADMINURL'/admins/login-admins.php</script>";
}
 if(isset($_POST['submit'])){
  if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['location'])) {
    echo "<script>alert('One or more inputs are empty')</script>";
} else {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $location = $_POST['location'];
    $image = $_FILES['image']['name'];

    $dir = __DIR__ . "/hotels_images/" . basename($image);
    if (!file_exists('hotels_images')) {
        mkdir('hotels_images', 0777, true); // Create the directory if it doesn't exist
    }

    $insert = "INSERT INTO hotels (name, description, location, image) VALUES ('$name', '$desc', '$location', '$image')";
    $stmt = $PDO->prepare($insert);
    $stmt->execute();

    if (move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
        header("Location: show-hotels.php");
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
              <h5 class="card-title mb-5 d-inline">Create Hotels</h5>
          <form method="POST" action="create-hotels.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>

                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control"/>
                 
                </div>

                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea name="description" class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-outline mb-4 mt-4">
                  <label for="exampleFormControlTextarea1">Location</label>

                  <input type="text" name="location" id="form2Example1" class="form-control"/>
                 
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>
<?php require '../layouts/footer.php';?>