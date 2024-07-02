<?php
require('db.php');

$errors = array(); 

if (isset($_REQUEST['gym'])) {
    $gym_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
    $type = mysqli_real_escape_string($conn, $_REQUEST['type']);

    // Perform validation
    if (empty($gym_id)) {
        array_push($errors, "<div class='alert alert-danger'><b>Gym ID is required</b></div>");
    }
    // Add more validation checks if needed
    
    // If there are no errors, insert data into the database
    if (empty($errors)) {
        $insert_query = "INSERT INTO gym (gym_id, gym_name, address, type) 
                         VALUES ('$gym_id', '$name', '$address', '$type')";
        $insert_sql = mysqli_query($conn, $insert_query);

        if ($insert_sql) {
            $msg = "<div class='alert alert-success'><b>Gym added successfully</b></div>";
        } else {
            $msg = "<div class='alert alert-warning'><b>Gym not added</b></div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Gym</title>
    <style>
         
        .w3-container {
            max-width: 600px;
            margin: 0 auto;
            margin-left: 200px;
            padding: 20px;
            background-color: transparent;
            border-radius: 10px;
        }
        body {
        
        background-size: cover;
        background-position: center;
    }
    </style>
    <link rel="stylesheet" href="path/to/bootstrap.css">
</head>
<body>
    <div class="w3-container">
        <form class="form-group mt-3" method="post" action="">
            <div><h3>ADD GYM</h3></div>
            <?php include('errors.php'); 
            echo @$msg;
            ?>
            <label class="mt-3">GYM ID</label>
            <input type="text" name="id" class="form-control">
            <label class="mt-3">GYM NAME</label>
            <input type="text" name="name" class="form-control">
            <label class="mt-3">GYM ADDRESS</label>
            <input type="text" name="address" class="form-control">
            <label class="mt-3">GYM TYPE</label>
            <select name="type" class="form-control mt-3">
                <option value="unisex">UNISEX</option>
                <option value="women">WOMEN</option>
                <option value="men">MEN</option>  
            </select>
            <button class="btn btn-dark mt-3" type="submit" name="gym">ADD</button>
        </form>
    </div>
</body>
</html>
