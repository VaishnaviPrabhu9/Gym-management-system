
<?php
ob_start(); // Start output buffering

require('db.php');

$mem_id = $_GET['id'];

$sql_delete_member = "DELETE FROM member WHERE mem_id='$mem_id'";
$delete_member = mysqli_query($conn, $sql_delete_member);

if ($delete_member) {
    ob_end_clean(); // Clear the output buffer without sending it

   
    exit(); // Ensure that the script stops executing after the redirect
} else {
    echo "Error deleting member: " . mysqli_error($conn);
}

ob_end_flush(); // Send captured output to the browser
?>
