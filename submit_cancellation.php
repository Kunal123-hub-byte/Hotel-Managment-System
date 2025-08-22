<?php
// Include database connection
include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id    = mysqli_real_escape_string($conn, $_POST['booking_id']);
    $name          = mysqli_real_escape_string($conn, $_POST['name']);
    $email         = mysqli_real_escape_string($conn, $_POST['email']);
    $phone         = mysqli_real_escape_string($conn, $_POST['phone']);
    $reason        = mysqli_real_escape_string($conn, $_POST['reason']);
    $refund_method = mysqli_real_escape_string($conn, $_POST['refund_method']);
    $message       = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert cancellation request into database
    $sql = "INSERT INTO cancellations (booking_id, name, email, phone, reason, refund_method, message, created_at) 
            VALUES ('$booking_id', '$name', '$email', '$phone', '$reason', '$refund_method', '$message', NOW())";

    if ($conn->query($sql) === TRUE) {
          echo "<h3 style='text-align:center;color:green;margin-top:50px;'>Payment cancellation Successful!</h3>";
        echo "<p style='text-align:center;'><a href='payments.php'>Make Another Payment</a></p>";
         echo "<p style='text-align:center;'><a href='view_cancellation.php'>Check payments cancellation</a></p>";
       
         

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
