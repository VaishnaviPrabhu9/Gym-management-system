<?php
require('db.php');

$pay_id = $_GET['id'];

$sql_delete_payment = "DELETE FROM payment WHERE pay_id='$pay_id'";
$query_delete_payment = mysqli_query($conn, $sql_delete_payment);

if ($query_delete_payment) {
    mysqli_close($conn); // Close the database connection

    // Clear any existing output before sending the header
    ob_clean();

    exit(); // Ensure that the script stops executing after the redirect
} else {
    echo "Error deleting payment: " . mysqli_error($conn);
}
?>
