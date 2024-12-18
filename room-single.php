<?php
require 'includes/header.php';
require 'config/config.php';

if(isset($_GET['id']) && isset($_SESSION['id'])){
	$uID=$_SESSION['id'];
	$id=$_GET['id'];
	$room="SELECT * FROM rooms WHERE status='1' AND id='$id'";
	$stmt=$PDO->prepare($room);
	$stmt->execute();
	$res=$stmt->fetch(PDO::FETCH_ASSOC);
	$image=$res['image'];
	$name=$res['name'];
	$utilities="SELECT * FROM utilities WHERE room_id='$id'";
	$stmt2=$PDO->prepare($utilities);
	$stmt2->execute();
	$AlreadyBooked="SELECT * FROM bookings WHERE user_id='$uID' AND room_name='$name'"; 
	$check=$PDO->prepare($AlreadyBooked);
	$check->execute();
	$checkRes=$check->fetch(PDO::FETCH_ASSOC);
	if(isset($_POST['submit'])){
		if(empty($_POST['phone_number'])||empty($_POST['email'])||empty($_POST['full_name'])
			||empty($_POST['check_in'])||empty($_POST['check_out'])){
		  echo "<script>alert('One or more inputs are empty')</script>";
		}
		else if(!empty($checkRes['id'])){
			echo "<script>alert('You already booked this room')</script>";
		}
		else{
			$email=$_POST['email'];
			$phone_number=$_POST['phone_number'];
			$full_name=$_POST['full_name'];
			$check_in=$_POST['check_in'];
			$check_out=$_POST['check_out'];
			$user_id=$_SESSION['id'];
			$room_name=$res['name'];
			$hotel_name=$res['hotel_name'];
			if(date("m/d/Y")>$check_in OR date("m/d/Y") > $check_out){
				echo "<script>alert('Pick a date that is not in the past')</script>";
			}
			else{
				if($check_in>$check_out || $check_in==date("m/d/Y")){
					echo "<script>alert('Pick a date that is not today
							 for check-in and pick a date that is less 
							 	than check-out date')</script>";
				}
				else{
					$booking="INSERT INTO bookings 
					(check_in,check_out,email,phone_number,full_name,hotel_name,room_name,user_id) VALUES 
					('$check_in','$check_out','$email','$phone_number','$full_name','$hotel_name','$room_name','$user_id')";
					$stmt3=$PDO->prepare($booking);
					$stmt3->execute();
				}
			}
		}
	}
}else{
	echo "<script>window.location.href='".$APPURL."/MustBeLoggedIn.php'</script>";
}
?>

    <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo $APPURL?>images/<?php echo $image;?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate">
          	<h2 class="subheading">Welcome to Vacation Rental</h2>
          	<h1 class="mb-4"><?php echo $name;?></h1>
            <!-- <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p> -->
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    	<div class="container">
	    	<div class="row justify-content-end">
	    		<div class="col-lg-4">
					<form action="room-single.php?id=<?php echo $id;?>" method="POST" class="appointment-form" style="margin-top: -568px;">
						<h3 class="mb-3">Book this room</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="email" class="form-control" placeholder="Email">
								</div>
							</div>
						   
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="full_name" class="form-control" placeholder="Full Name">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
								<div class="input-wrap">
									<div class="icon"><span class="ion-md-calendar"></span></div>
										<input type="text" name="check_in" class="form-control appointment_date-check-in" placeholder="Check-In">
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
									<div class="form-group">
										<div class="icon"><span class="ion-md-calendar"></span></div>
										<input type="text" name="check_out" class="form-control appointment_date-check-out" placeholder="Check-Out">
									</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" name="submit" value="Book and Pay Now" class="btn btn-primary py-3 px-4">
								</div>
							</div>
						</div>
				</form>
	    		</div>
	    	</div>
	    </div>
    </section>
   


  


    <section class="ftco-section bg-light">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 wrap-about">
						<div class="img img-2 mb-4" style="background-image: url(images/image_2.jpg);">
						</div>
						<h2>The most recommended vacation rental</h2>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section">
	          	<div class="pl-md-5">
		            <h2 class="mb-2">What we offer</h2>
	            </div>
	          </div>
	          <div class="pl-md-5">
							<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
					<div class="row">
						<?php
							while($row=$stmt2->fetch(PDO::FETCH_ASSOC)){
								$uName=$row['name'];
								$uIcon=$row['icon'];
								$uDesc=$row['description'];
								echo '<div class="services-2 col-lg-6 d-flex w-100">
		              <div class="icon d-flex justify-content-center align-items-center">
		            			<span class='.$uIcon.'></span>
		              </div>
		              <div class="media-body pl-3">
		                <h3 class="heading">'.$uName.'</h3>
		                <p>'.$uDesc.'</p>
		              </div>
		            </div>'; 
					}?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		
		<section class="ftco-intro" style="background-image: url(<?php echo $APPURL;?>images/image_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-9 text-center">
						<h2>Ready to get started</h2>
						<p class="mb-4">It’s safe to book online with us! Get your dream stay in clicks or drop us a line with your questions.</p>
						<p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Learn More</a> <a href="#" class="btn btn-white px-4 py-3">Contact us</a></p>
					</div>
				</div>
			</div>
		</section>
<?php
require 'includes/footer.php';
?>