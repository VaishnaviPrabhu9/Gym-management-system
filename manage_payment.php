<!DOCTYPE html>
<html>
<head>
  <title>Payment Area Search</title>
  <!-- Include your existing head content here -->
  <style>
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
      margin-bottom: 40px; /* Adjust the margin as needed */
    }

    /* Additional styles for the table */
    .table th,
    .table td {
      padding: 5px; /* Adjust as needed for spacing */
    }
 
  </style>
</head>
<body>
  <!-- Include your existing navigation or header here -->

  <div class="container">
    <form class="form-group mt-3" method="post" action="home.php?info=payment_search">
      <h3 class="lead">SEARCH PAYMENT AREA</h3>
      <input type="text" name="id" class="form-control" placeholder="ENTER PAYMENT AREA ID">
    </form>

    <table class="table table-bordered table-hover">
      <tr>
        <th>PAYMENT AREA ID</th>
        <th>AMOUNT</th>
        <th>MEM ID</th>
      </tr>
      <?php
        require('db.php');

        $all = "SELECT * FROM payment";
        $all_query = mysqli_query($conn, $all);
        if (mysqli_num_rows($all_query) > 0) {
          while ($row = mysqli_fetch_assoc($all_query)) {
            echo "<tr>";
            echo "<td>".$row['pay_id']."</td>";
            echo "<td>".$row['amount']."</td>";
            echo "<td>".$row['gym_id']."</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='3'>0 results</td></tr>";
        }
      ?>
    </table>
  </div>

  <!-- Include your existing footer or scripts here -->
</body>
</html>
