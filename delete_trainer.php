<?php
ob_start(); // Start output buffering

require('db.php');

if(isset($_GET['id'])) {
    $inf = $_GET['id'];
    
    // Sanitize the input
    $inf = mysqli_real_escape_string($conn, $inf);
    
    // Delete the trainer
    $sql_delete_trainer = "DELETE FROM trainer WHERE trainer_id = '$inf'";
    $query_delete_trainer = mysqli_query($conn, $sql_delete_trainer);

    if ($query_delete_trainer) {
        ob_end_clean(); // Clear the output buffer without sending it

        // Redirect to the view page for trainers
      
        exit(); // Ensure that the script stops executing after the redirect
    } else {
        // Log the error instead of directly showing it to the user
        error_log("Error deleting trainer: " . mysqli_error($conn));
        echo "An error occurred while deleting the trainer.";
    }
} else {
    echo "Invalid input.";
}

ob_end_flush(); // Send captured output to the browser
?>
