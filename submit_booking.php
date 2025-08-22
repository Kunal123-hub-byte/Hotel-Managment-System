<?php
include 'db.php'; // database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name       = $_POST['name'];
    $phone      = $_POST['phone'];
    $email      = $_POST['email'];
    $checkin    = $_POST['checkin_date'];
    $checkout   = $_POST['checkout_date'];
    $guests     = $_POST['guests'];
    $room_type  = $_POST['room_type'];
    $requests   = $_POST['special_requests'];

    // Prepare SQL query
    $sql = "INSERT INTO bookings ( name, phone, email, checkin_date, checkout_date, guests, room_type, special_requests) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssiis", $name, $phone, $email, $checkin, $checkout, $guests, $room_type, $requests);

        if ($stmt->execute()) {
           echo "<h3 style='color:green;text-align:center;'>Enquiry Submitted Successfully!</h3>";
        echo "<p style='text-align:center;'><a href='booking.php'>Back to Form</a></p>";
        echo "<p style='text-align:center;'><a href='view_booking.php'>Check Booking</a></p>";
        echo "<p style='text-align:center;'><a href='payments.php' class='btn btn-primary'>Payment</a></p>";  
    } else {
        echo "<h3 style='color:red;text-align:center;'>Error: " . $stmt->error . "</h3>";
    }
     $stmt->close();
    $conn->close();

} else {
    echo "Invalid request.";
}

}
?>
