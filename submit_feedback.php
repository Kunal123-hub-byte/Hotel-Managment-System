<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $booking_id = intval($_POST['booking_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $rating = intval($_POST['rating']);
    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

    // Optional: check if booking exists
    $checkBooking = "SELECT id FROM bookings WHERE id=$booking_id";
    $result = $conn->query($checkBooking);
    if ($result->num_rows == 0) {
        die("Booking ID does not exist.");
    }

    $sql = "INSERT INTO feedbacks (booking_id, name, email, rating, feedback)
            VALUES ('$booking_id', '$name', '$email', '$rating', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3 style='text-align:center;color:green;margin-top:50px;'>Feedback Submitted Successfully!</h3>";
        echo "<p style='text-align:center;'><a href='feedback.php'>Submit Another Feedback</a></p>";
        echo "<p style='text-align:center;'><a href='view_feedback.php'>Check Feedback</a></p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
