<?php
require('db.php');

$errors = array(); 

if (isset($_REQUEST['payment'])) {

    $pay_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $amount = mysqli_real_escape_string($conn, $_REQUEST['amount']);
    $gym_id = mysqli_real_escape_string($conn, $_REQUEST['gym_id']);
    
    // Check if the provided gym_id exists in the gym table
    $check_gym_query = "SELECT * FROM gym WHERE gym_id = '$gym_id'";
    $result_gym = mysqli_query($conn, $check_gym_query);
    
    if (mysqli_num_rows($result_gym) == 0) {
        array_push($errors, "<div class='alert alert-danger'><b>No gym with ID $gym_id exists</b></div>");
    }
    
    // Check if a payment record already exists for the provided gym_id
    $check_payment_query = "SELECT * FROM payment WHERE gym_id = '$gym_id'";
    $result_payment = mysqli_query($conn, $check_payment_query);
    
    if (mysqli_num_rows($result_payment) > 0) {
        array_push($errors, "<div class='alert alert-warning'><b>Payment record already exists for gym with ID $gym_id</b></div>");
    }
    
    $user_check_query = "SELECT * FROM payment WHERE pay_id='$pay_id' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { 
        if ($user['pay_id'] === $pay_id) {
            array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
        }
    }
    
    if (count($errors) == 0) {
        $query = "INSERT INTO payment (pay_id, amount, gym_id) 
                  VALUES ('$pay_id', '$amount', '$gym_id')";
        $sql = mysqli_query($conn, $query);
        
        if ($sql) {
            $msg = "<div class='alert alert-success'><b>Payment area added successfully</b></div>";
        } else {
            $msg = "<div class='alert alert-warning'><b>Payment area not added</b></div>";
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
        <h3>ADD PAYMENT AREA</h3>
        <?php 
        include('errors.php'); 
        echo @$msg;
        ?>
        <label class="mt-3">PAYMENT AREA ID</label>
        <input type="text" name="id" class="form-control">
        <label class="mt-3">AMOUNT</label>
        <input type="text" name="amount" class="form-control">
        <label class="mt-3">MEM ID</label>
        <input type="text" name="gym_id" class="form-control">
        <button class="btn btn-dark mt-3" type="submit" name="payment">ADD</button>
    </form>
</div>
