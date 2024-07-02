<?php
require('db.php');

$errors = array();

if (isset($_POST['gym'])) { // Check for POST request
    $old_gym_id = mysqli_real_escape_string($conn, $_POST['old_id']); // Retrieve old gym ID
    $gym_id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    // Update child tables first to avoid foreign key constraint issues
    $update_member_query = "UPDATE member SET gym_id = '$gym_id' WHERE gym_id = '$old_gym_id'";
    mysqli_query($conn, $update_member_query);

    $update_payment_query = "UPDATE payment SET gym_id = '$gym_id' WHERE gym_id = '$old_gym_id'";
    mysqli_query($conn, $update_payment_query);

    $update_trainer_query = "UPDATE trainer SET gym_id = '$gym_id' WHERE gym_id = '$old_gym_id'";
    mysqli_query($conn, $update_trainer_query);

    // Then, update the gym table
    $update_gym_query = "UPDATE gym SET gym_id='$gym_id', gym_name='$name', address='$address', type='$type' WHERE gym_id='$old_gym_id'";
    $update_gym_sql = mysqli_query($conn, $update_gym_query);

    if ($update_gym_sql) {
        $err = "<div class='alert alert-success'><b>Gym Details updated</b></div>";
    } else {
        $err = "<div class='alert alert-danger'><b>Error updating gym details: " . mysqli_error($conn) . "</b></div>";
    }
}

$gym_id_to_update = $_GET['id'];
$con = mysqli_query($conn, "SELECT * FROM gym WHERE gym_id='" . mysqli_real_escape_string($conn, $gym_id_to_update) . "'");
$res = mysqli_fetch_assoc($con);
?>

<style>
    .container {
        background-size: cover;
        background-position: center;
        padding: 20px; /* Adding some padding to the container for better readability */
    }
</style>

<div class="container">
    <form class="form-group mt-3" method="post" action="">
        <div><h3>UPDATE GYM</h3></div>
        <?php
        echo @$err;
        ?>
        <input type="hidden" name="old_id" value="<?php echo @$res['gym_id']; ?>">
        <label class="mt-3">GYM ID</label>
        <input type="text" name="id" value="<?php echo @$res['gym_id']; ?>" class="form-control">
        <label class="mt-3">GYM NAME</label>
        <input type="text" name="name" value="<?php echo @$res['gym_name']; ?>" class="form-control">
        <label class="mt-3">GYM ADDRESS</label>
        <input type="text" name="address" value="<?php echo @$res['address']; ?>" class="form-control">
        <label class="mt-3">GYM TYPE</label>
        <input type="text" name="type" value="<?php echo @$res['type']; ?>" class="form-control">
        <button class="btn btn-dark mt-3" type="submit" name="gym">UPDATE</button>
    </form>
</div>
