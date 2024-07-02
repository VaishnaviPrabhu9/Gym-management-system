<?php
require('db.php');

$errors = array();

if (isset($_REQUEST['payment'])) {
    $old_pay_id = $_GET['id']; // Store the old payment ID before updating
    $pay_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $amount = mysqli_real_escape_string($conn, $_REQUEST['amount']);

    // Update payment details
    $update_query = "UPDATE payment SET pay_id='$pay_id', amount='$amount' WHERE pay_id='$old_pay_id'";
    $update_sql = mysqli_query($conn, $update_query);

    // Update the pay_id in related member records
    $update_member_query = "UPDATE member SET pay_id = '$pay_id' WHERE pay_id = '$old_pay_id'";
    mysqli_query($conn, $update_member_query);

    // Update the pay_id in related trainer records
    $update_trainer_query = "UPDATE trainer SET pay_id = '$pay_id' WHERE pay_id = '$old_pay_id'";
    mysqli_query($conn, $update_trainer_query);

    if ($update_sql) {
        $err = "<div class='alert alert-success'><b>Payment Area Details updated</b></div>";
    } else {
        $err = "<div class='alert alert-danger'><b>Error updating payment details: " . mysqli_error($conn) . "</b></div>";
    }
}

$con = mysqli_query($conn, "SELECT * FROM payment WHERE pay_id='".$_GET['id']."'");
$res = mysqli_fetch_assoc($con);
?>

<div class="container">
    <form class="mt-3 form-group" method="post" action="">
        <h3>UPDATE PAYMENT AREA</h3>
        <?php 
        echo @$err;
        ?>
        <label class="mt-3">PAYMENT AREA ID</label>
        <input type="text" name="id" value="<?php echo @$res['pay_id'];?>" class="form-control">
        <label class="mt-3">AMOUNT</label>
        <input type="text" name="amount" value="<?php echo @$res['amount'];?>" class="form-control">
        <label class="mt-3">GYM ID</label>
        <input type="text" name="gym_id" value="<?php echo @$res['gym_id'];?>" class="form-control">
        <button class="btn btn-dark mt-3" type="submit" name="payment">UPDATE</button>
    </form>
</div>
