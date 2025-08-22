<?php
include 'db.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get POST data and sanitize
    $booking_id = intval($_POST['booking_id']);
    $payer_name = mysqli_real_escape_string($conn, $_POST['payer_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $amount = floatval($_POST['amount']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);

    // Validate required fields
    if (empty($booking_id) || empty($payer_name) || empty($email) || empty($amount) || empty($payment_method)) {
        die("All fields are required.");
    }

    // Optional: Check if booking exists
    $checkBooking = "SELECT id FROM bookings WHERE id = $booking_id";
    $result = $conn->query($checkBooking);
    if ($result->num_rows == 0) {
        die("Booking ID does not exist.");
    }

    // Insert payment into database
    $sql = "INSERT INTO payments (booking_id, payer_name, email, amount, payment_method)
            VALUES ('$booking_id', '$payer_name', '$email', '$amount', '$payment_method')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3 style='text-align:center;color:green;margin-top:50px;'>Payment Successful!</h3>";
        echo "<p style='text-align:center;'><a href='payments.php'>Make Another Payment</a></p>";
         echo "<p style='text-align:center;'><a href='view_payments.php'>Check payments</a></p>";
         echo "<p style='text-align:center;'><a href='cancellation.php'>Cancel payments</a></p>";
         

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
