<?php
require('db.php');

$errors = array();

if (isset($_POST['member'])) {
    $mem_id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
   
    $mobileno = mysqli_real_escape_string($conn, $_POST['mobileno']);
    $gym_id = mysqli_real_escape_string($conn, $_POST['gym_id']);
    
    // Data validation
    if (empty($mem_id) || empty($name) || empty($age) || empty($dob) || empty($mobileno) || empty($gym_id)) {
        array_push($errors, "<div class='alert alert-danger'><b>All fields are required</b></div>");
    } else {
        // Check if the provided gym_id exists in the gym table
        $check_gym_query = "SELECT * FROM gym WHERE gym_id = '$gym_id'";
        $result = mysqli_query($conn, $check_gym_query);
        if (mysqli_num_rows($result) == 0) {
            $msg = "<div class='alert alert-danger'><b>No gym with ID $gym_id exists</b></div>";
        } else {
            // Insert data into the database
            $insert_query = "INSERT INTO member (mem_id, name, age, dob, mobileno, gym_id) 
                             VALUES ('$mem_id', '$name', '$age', '$dob', '$mobileno', '$gym_id')";
            
            $result = mysqli_query($conn, $insert_query);
            if ($result) {
                $msg = "<div class='alert alert-success'><b>Member added successfully</b></div>";
            } else {
                $msg = "<div class='alert alert-danger'><b>Error adding member: " . mysqli_error($conn) . "</b></div>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here -->
</head>
<body>
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
        <form class="form-group mt-3" method="post" action="">
            <div><h3>ADD MEMBER</h3></div>
            <?php
            include('errors.php');
            echo @$msg;
            ?>
            <label class="mt-3">MEMBER ID</label>
            <input type="text" name="id" class="form-control">
            <label class="mt-3">MEMBER NAME</label>
            <input type="text" name="name" class="form-control">
            <label class="mt-3">AGE</label>
            <input type="text" name="age" class="form-control">
            <label class="mt-3">DOB</label>
            <input type="date" name="dob" class="form-control"> <!-- Use type="date" input for DOB -->
            
            <label class="mt-3">MOBILE NO</label>
            <input type="text" name="mobileno" class="form-control">
            
            <label class="mt-3">GYM ID</label>
            <input type="text" name="gym_id" class="form-control">
            <button class="btn btn-dark mt-3" type="submit" name="member">ADD</button>
        </form>
    </div>
</body>
</html>
