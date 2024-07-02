<!DOCTYPE html>
<html>
<head>
  <title>Payment Area Search</title>
  <style>
    body {
      background-image: url('train.png'); /* Replace with your image URL */
      background-size: cover;
      background-repeat: no-repeat;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .table {
      background-color: rgba(128, 128, 128, 0.4);
    }

    .form-group {
      margin-bottom:30px; /* Remove excessive margin */
    }

    .table th,
    .table td {
      padding: 5px; /* Adjust as needed for spacing */
    }
  </style>
</head>
<body>
<div class="container">
    <form class="form-group mt-3" method="post" action="home.php?info=trainer_search">
        <h3 class="lead">SEARCH TRAINER</h3>
        <input type="text" name="name" class="form-control" placeholder="ENTER TRAINER NAME OR TRAINER ID">
    </form>

    <div class="container">
        <table class="table table-bordered table-hover">
            <tr>
                <th>TRAINER ID</th>
                <th>NAME</th>
                <th>TIME</th>
                <th>MOBILE NO</th>
                <th>GYM ID</th>
            </tr>
            <?php
            require('db.php');
            
            $all = "SELECT * FROM trainer";
            $all_query = mysqli_query($conn, $all);
            
            if (mysqli_num_rows($all_query) > 0) {
                while ($row = mysqli_fetch_assoc($all_query)) {
                    echo "<tr>";
                    echo "<td>" . $row['trainer_id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['time'] . "</td>";
                    echo "<td>" . $row['mobileno'] . "</td>";
                    echo "<td>" . $row['gym_id'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>0 results</td></tr>";
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
