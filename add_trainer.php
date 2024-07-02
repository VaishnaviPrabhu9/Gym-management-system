<?php

require('db.php');

$errors = array(); 
if (isset($_REQUEST['trainer'])) {

  $trainer_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $time = mysqli_real_escape_string($conn, $_REQUEST['time']);
  $mobileno = mysqli_real_escape_string($conn, $_REQUEST['mobileno']);
  $gym_id = mysqli_real_escape_string($conn, $_REQUEST['gym_id']);
  
  // Check if mobileno is exactly 10 digits long
  if (strlen($mobileno) != 10) {
      array_push($errors, "<div class='alert alert-danger'><b>Wrong phone number: Phone number should be 10 digits long</b></div>");
  }
  
  $user_check_query = "SELECT * FROM trainer WHERE trainer_id='$trainer_id' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['trainer_id'] === $trainer_id) {
      array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
    }
  }

  if (count($errors) == 0) {
    $query = "INSERT INTO trainer (trainer_id,name,time,mobileno,gym_id) 
          VALUES('$trainer_id','$name','$time','$mobileno','$gym_id')";
    $sql=mysqli_query($conn, $query);
    if ($sql) {
      $msg="<div class='alert alert-success'><b>Trainer added successfully</b></div>";
    } else {
      $msg="<div class='alert alert-warning'><b>Trainer not added</b></div>";
    }
  }
}

?>

<style>
    body {
        background-image: url('gym.jpg');
        background-size: cover;
        background-position: center;
    }
    .container {
        max-width: 700px; /* Adjust this value to control the container width */
        margin: 0 auto; /* Center the container horizontally */
        margin-left: 150px; /* Adjust this value to move the container slightly left */
        padding: 20px;
        background-color: transparent;
        border-radius: 10px;
    }
</style>

<div class="container">
	<form class="mt-3 form-group" method="post" action="">
		<h3>ADD TRAINER</h3>
		<?php 
      include('errors.php'); 
      echo @$msg;
    ?>
		<label class="mt-3">TRAINER ID</label>
		<input type="text" name="id" class="form-control">
		<label class="mt-3">TRAINER NAME</label>
		<input type="text" name="name" class="form-control">
		<label class="mt-3">TIME</label>
		<input type="text" name="time" class="form-control">
		<label class="mt-3">MOBILE NO</label>
		<input type="text" name="mobileno" class="form-control">
		<label class="mt-3">GYM ID</label>
		<input type="text" name="gym_id" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="trainer">ADD</button>
	</form>
</div>
