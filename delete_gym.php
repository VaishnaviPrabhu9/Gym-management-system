<?php
require('db.php');

$gym_id = $_GET['id'];

// Delete payments associated with the gym
$sql_delete_payments = "DELETE FROM payment WHERE gym_id='$gym_id'";
$query_delete_payments = mysqli_query($conn, $sql_delete_payments);

if ($query_delete_payments) {
    // Delete trainers associated with the gym
    $sql_delete_trainers = "DELETE FROM trainer WHERE gym_id='$gym_id'";
    $query_delete_trainers = mysqli_query($conn, $sql_delete_trainers);

    if ($query_delete_trainers) {
        // Delete members associated with the gym
        $sql_delete_members = "DELETE FROM member WHERE gym_id='$gym_id'";
        $query_delete_members = mysqli_query($conn, $sql_delete_members);

        if ($query_delete_members) {
            // Finally, delete the gym itself
            $sql_delete_gym = "DELETE FROM gym WHERE gym_id='$gym_id'";
            $query_delete_gym = mysqli_query($conn, $sql_delete_gym);

            if ($query_delete_gym) {
                
            } else {
                echo "Error deleting gym: " . mysqli_error($conn);
            }
        } else {
            echo "Error deleting members: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting trainers: " . mysqli_error($conn);
    }
} else {
    echo "Error deleting payments: " . mysqli_error($conn);
}
?>
