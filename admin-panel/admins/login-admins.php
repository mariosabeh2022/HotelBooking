<?php 
require '../layouts/header.php';
require '../../config/config.php';
if(isset($_SESSION['adminname'])){
  echo "<script>window.location.href='$ADMINURL'</script>";
}
if(isset($_POST['submit'])){
  if(empty($_POST['email'])||empty($_POST['password'])){
    echo "<script>alert('One or more inputs are empty')</script>";
  }
  else{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="SELECT * FROM admins WHERE email='$email'";
    $stmt=$PDO->prepare($query);
    $stmt->execute();
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    if($row){
      if(password_verify($password,$row['mypassword'])){
        $_SESSION['id']=$row['id'];
        $_SESSION['adminname']=$row['adminname'];
        echo"<script>window.location.href='$ADMINURL'</script>";
      }
      else{
        echo "<scritp>alert('Email or password is wrong')</script>";
      }
    }
    else echo "<scritp>alert('Email or password is wrong')</script>";
  }
}  
?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>
              <form action="login-admins.php" method="POST" class="p-auto">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>

            </div>
       </div>
     </div>
    </div>
<?php require '../layouts/footer.php';?>
