<!DOCTYPE html>
<html>
<head>
  <title>Payment Area Search</title>
  <!-- Include your existing head content here -->
  <style>
  /* height: 10px; Remove the height property */
  body {
      background-image: url('great.jpg'); /* Replace with your image URL */
      background-size: cover;
      background-repeat: no-repeat;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    
    /* Apply the same background properties to the table as the container */
    .table {
		background-color: rgba(128, 128, 128, 0.4);
 /* Same as the container's background */
    }
	.form-group {
      margin-bottom: -60px; /* Adjust the margin as needed */
    }

    /* Additional styles for the table */
    .table th,
    .table td {
      padding: 5px; /* Adjust as needed for spacing */
    }
    .form-group {
    margin: 10px; /* Remove the margin */
  }

  .container {
    margin-top: 30px; /* Increase the margin to create a gap */
    height: -10px; Remove the height property
  }
  </style>
</head>
<body>

<div class="container">
	<form class="form-group mt-3" method="post" action="home.php?info=member_search">
		<h3 class="lead">SEARCH MEMBER</h3>
		<input type="text" name="name" class="form-control" placeholder="ENTER MEMBER NAME OR MEMBER ID">
	</form>

	<div class="container">
		<table class="table table-bordered table-hover">
			<tr>
				<th>MEMBER ID</th>
				<th>MEMBER NAME</th>
				<th>AGE</th>
				<th>DOB</th>			
				
				<th>MOBILE NO</th>
				
				<th>GYM ID</th>

			</tr>
			<?php
           require('db.php');


$all="SELECT * FROM member";
$all_query=mysqli_query($conn,$all);
if (mysqli_num_rows($all_query) > 0) {
    while($row = mysqli_fetch_assoc($all_query)) {
       echo "<tr>";
		echo "<td>".$row['mem_id']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['age']."</td>";
		echo "<td>".$row['dob']."</td>";
		
		echo "<td>".$row['mobileno']."</td>";
		
		echo "<td>".$row['gym_id']."</td>";
	   echo "</tr><br>";
    }
} else {
    echo "0 results";
}



?>
			
		</table>
	</div>
</div>
