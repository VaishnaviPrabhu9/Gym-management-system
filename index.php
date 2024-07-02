<?php
session_start();
require('db.php');
$username="";
$errors = array(); 

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
  if (count($errors) == 0) {
    $query = "SELECT * FROM login WHERE username='$username' AND pwd='$pwd'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      header("location:home.php");
    } else {
      array_push($errors, "<div class='alert alert-warning'><b>Wrong username/password combination</b></div>");
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>GYM MANAGEMENT SYSTEM</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<style type="text/css">
		body {
			background-image: url('gym.jpg');
			background-size: cover;
			font-family: Arial, sans-serif;
		}

		.container {
			max-width: 400px;
			margin: 150px auto;
			padding: 20px;
			background-color: rgba(255, 255, 255, 0.9);
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
		}

		.container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
    font-family: Arial, sans-serif;
/* Set the font family to Arial and a generic sans-serif as fallback */
    font-size: 25px; /* Adjust the value as needed */
    font-weight: bold;
    margin-bottom: 40px; /* You can also use values like "700" for bolder */
}


		.form-group {
			margin-bottom: 20px;
		}

		.form-group label {
			font-weight: bold;
			color: #333;
		}

		.form-control {
			border: none;
			border-radius: 5px;
			padding: 10px;
			background-color: #f2f2f2;
			color: #333;
		}

		.form-control:focus {
			box-shadow: none;
		}

		.btn-login {
			background-color: #007bff;
			color: #fff;
			border: none;
			border-radius: 5px;
			padding: 10px;
			width: 100%;
			cursor: pointer;
		}

		.btn-login:hover {
			background-color: #0056b3;
		}
    .footer {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            font-weight: bold;
        }
	</style>
</head>
<body>
	<div class="container">
		<h2>Gym Management Login</h2>
		<form action="" method="post">
			<div class="form-group">
				<!-- <label for="username">Username</label> -->
				<input type="text" class="form-control" placeholder="Username" name="username" required>
			</div>
			<div class="form-group">
				<!-- <label for="pwd">Password</label> -->
				<input type="password" class="form-control" placeholder="Password" name="pwd" required>
			</div>
			<button type="submit" class="btn btn-login" name="login">Login</button>
		</form>
	</div>
   </div>

    <!-- Footer section -->
    <<div class="footer" style="background-color: rgba(255, 255, 255, 0.8); color: #333;">
    <p>Name: Tanushka Raj</p>
    <p>Email: tanushkaraj05@gmail.com</p>
    <p>Contact: 9901934251</p>
</div>
</body>
</html>
