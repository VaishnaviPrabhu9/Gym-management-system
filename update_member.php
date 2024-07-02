<?php
require('db.php');

$errors = array();

if (isset($_REQUEST['member'])) {
    $old_mem_id = $_GET['id']; // Store the old member ID before updating
    $mem_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $age = mysqli_real_escape_string($conn, $_REQUEST['age']);
    $dob = mysqli_real_escape_string($conn, $_REQUEST['dob']);
    $mobileno = mysqli_real_escape_string($conn, $_REQUEST['mobileno']);
    $gym_id = mysqli_real_escape_string($conn, $_REQUEST['gym_id']);

    // Update member details
    $update_query = "UPDATE member SET mem_id='$mem_id', name='$name', age='$age', dob='$dob', mobileno='$mobileno', gym_id='$gym_id' WHERE mem_id='$old_mem_id'";
    $update_sql = mysqli_query($conn, $update_query);

    // Update the mem_id in related payment records
    $update_payment_query = "UPDATE payment SET mem_id = '$mem_id' WHERE mem_id = '$old_mem_id'";
    mysqli_query($conn, $update_payment_query);

    // Update the mem_id in related trainer records
    $update_trainer_query = "UPDATE trainer SET mem_id = '$mem_id' WHERE mem_id = '$old_mem_id'";
    mysqli_query($conn, $update_trainer_query);

    if ($update_sql) {
        $err = "<div class='alert alert-success'><b>Member Area Details updated</b></div>";
    } else {
        $err = "<div class='alert alert-danger'><b>Error updating member details: " . mysqli_error($conn) . "</b></div>";
    }
}

$con = mysqli_query($conn, "SELECT * FROM member WHERE mem_id='" . mysqli_real_escape_string($conn, $_GET['id']) . "'");
$res = mysqli_fetch_assoc($con);
?>

<div class="container">
    <form class="form-group mt-3" method="post" action="">
        <div><h3>UPDATE MEMBER</h3></div>
        <?php  
        echo @$err;
        ?>
        <label class="mt-3">MEMBER ID</label>
        <input type="text" name="id" value="<?php echo @$res['mem_id'];?>" class="form-control">
        <label class="mt-3">MEMBER NAME</label>
        <input type="text" name="name" value="<?php echo @$res['name'];?>" class="form-control">
        <label class="mt-3">AGE</label>
        <input type="text" name="age" value="<?php echo @$res['age'];?>" class="form-control">
        <label class="mt-3">DOB</label>
        <input type="date" name="dob" value="<?php echo @$res['dob'];?>" class="form-control"> <!-- Using type="date" for DOB -->
        <label class="mt-3">MOBILE NO</label>
        <input type="text" name="mobileno" value="<?php echo @$res['mobileno'];?>" class="form-control">
        <label class="mt-3">GYM ID</label>
        <input type="text" name="gym_id" value="<?php echo @$res['gym_id'];?>" class="form-control">
        <button class="btn btn-dark mt-3" type="submit" name="member">UPDATE</button>
    </form>
</div>
