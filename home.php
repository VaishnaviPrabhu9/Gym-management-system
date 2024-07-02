<?php
include("auth.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Gym Management System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link rel="stylesheet" href="style.css"> 
  <style>


/* Adjust the width of the dropdown menu */
.dropdown-menu {
    min-width: 200px; /* Adjust the width as needed */
}



	.navbar {
		background-color: black;
		height: 60px;
    margin-left: -30px; 
		width: 1565px; /* Set the width to 100% */
	}

	.bg-black {
		background-color: black;
	}
  .dropdown-menu {
  background-color: black; /* Change this color as desired */
}

.dropdown-item {
  color: white;
}

/* Hover effect for dropdown items */
.dropdown-item:hover {
  background-color: #555; /* Change this color as desired */
}

  .navbar-dark .navbar-toggler-icon {
    background-color: inherit;
	width: 50px; /* Change this color as desired */
  }
  /* Set background size to cover and fix position to center top */
body {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center top;
    margin: 0; /* Remove default margin for body element */
    padding: 0; /* Remove default padding for body element */
    height: 100vh; 
	background: cover;/* Set the height to 100% of viewport height */
}

/* Set content container to full height */
.row {
    height: 100%;
    margin: 0; /* Remove default margin for row element */
}


</style>

	</style>
</head>
<body style="background:url(logo.jpg); background-size: cover; background-repeat: no-repeat; background-position: center top;">


	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<div class="container-fluid">
			
			
			<ul class="navbar-nav ml-auto">
			<a href="home.php" class="nav nav-link">home</a>
      <a href="about.php" class="nav nav-link">about us</a>

   
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="gymDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">gym</a>
					<div class="dropdown-menu" aria-labelledby="gymDropdown">
						<a class="dropdown-item" href="home.php?info=add_gym">add gym</a>
						<a class="dropdown-item" href="home.php?info=manage_gym">view gym</a>
					</div>
				</li>
			
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="memberDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">member</a>
					<div class="dropdown-menu" aria-labelledby="memberDropdown">
						<a class="dropdown-item" href="home.php?info=add_member">add member</a>
						<a class="dropdown-item" href="home.php?info=manage_member">view member</a>
					</div>
				</li>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="paymentDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">payment</a>
					<div class="dropdown-menu" aria-labelledby="paymentDropdown">
						<a class="dropdown-item" href="home.php?info=add_payment">add payment</a>
						<a class="dropdown-item" href="home.php?info=manage_payment">view payment</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="trainerDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">trainer</a>
					<div class="dropdown-menu" aria-labelledby="trainerDropdown">
						<a class="dropdown-item" href="home.php?info=add_trainer">add trainer</a>
						<a class="dropdown-item" href="home.php?info=manage_trainer">view trainer</a>
					</div>
				</li>

				<a href="index.php" class="nav nav-link">log out</a>
			</ul>
		</div>
	</nav>
	<div class="row mt-3">
		<div class="col-2">
			<div id="accordion">
				<!-- ... Rest of the accordion code ... -->
			</div>
		</div>
		<div class="col-10">
			<?php
			@$info=$_GET['info'];
			if ($info!=="") {
         if ($info=="about_us") {
          include('about.php');
          }
        elseif ($info=="add_gym") {
          include('add_gym.php');
          }
          else if($info=="add_payment")
          {
          include('add_payment.php');
          }
          elseif ($info=="manage_payment") {
            include ('manage_payment.php');
          }elseif ($info=="add_member") {
            include ('add_member.php');
          }elseif ($info=="manage_member") {
            include ('manage_member.php');
          }elseif ($info=="add_trainer") {
            include ('add_trainer.php');
          }elseif ($info=="manage_trainer") {
            include ('manage_trainer.php');
          }elseif ($info=="manage_gym") {
            include ('manage_gym.php');
          }elseif ($info=="update_payment") {
            include ('update_payment.php');
          }elseif ($info=="delete_payment") {
            include ('delete_payment.php');
          }elseif ($info=="update_gym") {
            include ('update_gym.php');
          }elseif ($info=="delete_gym") {
            include ('delete_gym.php');
          }elseif ($info=="update_member") {
            include ('update_member.php');
          }elseif ($info=="delete_member") {
            include ('delete_member.php');
          }elseif ($info=="update_trainer") {
            include ('update_trainer.php');
          }elseif ($info=="delete_trainer") {
            include ('delete_trainer.php');
          }elseif ($info=="change_password") {
            include ('change_password.php');
          }elseif ($info=="gym_search") {
            include ('gym_search.php');
          }elseif ($info=="member_search") {
            include ('member_search.php');
          }elseif ($info=="payment_search") {
            include ('payment_search.php');
          }elseif ($info=="trainer_search") {
            include ('trainer_search.php');
          }
				// Include respective PHP files based on the info parameter
				// ...
			}
			?>
		</div>
	</div>
 
</body>
</html>
</body>
</html>
