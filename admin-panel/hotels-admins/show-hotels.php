<?php
require '../../config/config.php';
require '../layouts/header.php';

if(!isset($_SESSION['adminname'])){
  echo "<script>window.location.href='$ADMINURL'/admins/login-admins.php</script>";
}else{
$hotels="SELECT * FROM hotels";
$stmt=$PDO->prepare($hotels);
$stmt->execute();
}
?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Hotels</h5>
             <a  href="create-hotels.php" class="btn btn-primary mb-4 text-center float-right">Create Hotels</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">location</th>
                    <th scope="col">status value</th>
                    <th scope="col">change status</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php while($res=$stmt->fetch(PDO::FETCH_ASSOC)){
                  echo'
                  <tr>
                    <th scope="row">'.$res['id'].'</th>
                    <th scope="row">'.$res['name'].'</th>
                    <th scope="row">'.$res['location'].'</th>
                    <th scope="row">'.$res['status'].'</th>
                    <td><a  href="status-hotels.php?id='.$res['id'].'" class="btn btn-warning text-white text-center ">status</a></td>
                    <td><a  href="update-hotels.php?id='.$res['id'].'" class="btn btn-warning text-white text-center ">Update </a></td>
                    <td><a href="delete-hotels.php?id='.$res['id'].'" class="btn btn-danger  text-center ">Delete </a></td>
                  </tr>';
                }?>
                </tbody>
              </table> 
<?php require '../layouts/footer.php';?>