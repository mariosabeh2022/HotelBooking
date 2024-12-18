<?php
require '../includes/header.php';
require '../config/config.php';
if(isset($_SESSION['username'])){
  echo "<script>window.location.href='$APPURL'</script>";
}
if(isset($_POST['submit'])){
  if(empty($_POST['email'])||empty($_POST['password'])){
    echo "<script>alert('Email or password is wrong')</script>";
    header("refresh:2,url=$APPURL auth/login.php");
  }
  else{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="SELECT * FROM users WHERE email='$email'";
    $stmt=$PDO->prepare($query);
    $stmt->execute();
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    if($row){
      if(password_verify($password,$row['mypassword'])){
        $_SESSION['id']=$row['id'];
        $_SESSION['username']=$row['username'];
        echo "<script>window.location.href='$APPURL'</script>";
      }
      else{
        echo "<script>alert('Email or password is wrong')</script>";
        header("refresh:2,url=$APPURL auth/login.php");
      }
    }
    else {
      echo "<script>alert('Email or password is wrong')</script>";
      header("refresh:2,url=$APPURL auth/login.php");
    }
  }
}
require '../includes/footer.php';
?>