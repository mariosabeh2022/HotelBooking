<?php 
require '../layouts/header.php';
require '../../config/config.php';
if(isset($_SESSION['adminname'])){
  echo "<script>window.location.href='$ADMINURL'/admins/login-admins.php</script>";
}
$fetch="SELECT * FROM admins";
$stmt=$PDO->prepare($fetch);
$stmt->execute();
?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Admin Name</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  while($res=$stmt->fetch(PDO::FETCH_ASSOC)){
                    $AId=$res['id'];
                    $AName=$res['adminname'];
                    $AEmail=$res['email'];
                    echo'<tr>';
                    echo'<th scope="$row">'.$AId.'</th>';
                    echo'<td>'.$AName.'</td>';
                    echo'<td>'.$AEmail.'</td>'; 
                    echo'</tr>';
                  }
                  ?>
                </tbody>
              </table> 
<?php require '../layouts/footer.php';?>