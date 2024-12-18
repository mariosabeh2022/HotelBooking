<?php
require '../../config/config.php';
require '../layouts/header.php';

if(!isset($_SESSION['adminname'])){
  echo "<script>window.location.href='$ADMINURL'/admins/login-admins.php</script>";
}else{
$rooms="SELECT * FROM rooms";
$stmt=$PDO->prepare($rooms);
$stmt->execute();
$res=$stmt->fetchAll(PDO::FETCH_OBJ);
}
?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Rooms</h5>
             <a  href="create-rooms.php" class="btn btn-primary mb-4 text-center float-right">Create Room</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">num of persons</th>
                    <th scope="col">size</th>
                    <th scope="col">view</th>
                    <th scope="col">num of beds</th>
                    <th scope="col">hotel name</th>
                    <th scope="col">status value</th>
                    <th scope="col">change status</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($res as $r): ?>
                  <tr>
                    <th scope="row"><?php echo $r->id;?></th>
                    <td><?php echo $r->name;?></td>
                    <td><?php echo $r->num_persons;?></td>
                    <td><?php echo $r->size;?></td>
                    <td><?php echo $r->view;?></td>
                    <td><?php echo $r->num_beds;?></td>
                    <td><?php echo $r->hotel_name;?></td>
                    <td><?php echo $r->status;?></td>
                    <td><a href="status-rooms.php?id=<?php echo $r->id ?>" class="btn btn-warning  text-center ">status</a></td>
                    <td><a href="delete-rooms.php?id=<?php echo $r->id ?>" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
<?php require '../layouts/footer.php';?>