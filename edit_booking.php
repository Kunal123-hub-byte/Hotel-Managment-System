<?php
include 'db.php';

// Step 1: Get booking by ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM bookings WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $booking = $result->fetch_assoc();

    if (!$booking) {
        die("Booking not found!");
    }
} else {
    die("No booking ID provided!");
}

// Step 2: Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST['booking_id'];
    $name       = $_POST['name'];
    $phone      = $_POST['phone'];
    $email      = $_POST['email'];
    $checkin    = $_POST['checkin_date'];
    $checkout   = $_POST['checkout_date'];
    $guests     = $_POST['guests'];
    $room_type  = $_POST['room_type'];
    $requests   = $_POST['special_requests'];

   $update_sql = "UPDATE bookings 
    SET name = ?, phone = ?, email = ?, checkin_date = ?, checkout_date = ?, guests = ?, room_type = ?, special_requests = ? 
    WHERE id = ?";


   $stmt = $conn->prepare($update_sql);
$stmt->bind_param("sssssiisi", $name, $phone, $email, $checkin, $checkout, $guests, $room_type, $requests, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Booking updated successfully!'); window.location.href='view_booking.php';</script>";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Booking</h2>
    <form method="post" class="border p-4 rounded shadow bg-light">

        <!-- Booking ID (readonly) -->
        <label>Booking ID:</label>
        <input type="text" name="booking_id" value="<?php echo $booking['id']; ?>" class="form-control" readonly>

        <label class="mt-3">Full Name:</label>
        <input type="text" name="name" value="<?php echo $booking['name']; ?>" class="form-control" required>

        <label class="mt-3">Phone:</label>
        <input type="text" name="phone" value="<?php echo $booking['phone']; ?>" class="form-control" required pattern="[0-9]{10}" maxlength="10">

        <label class="mt-3">Email:</label>
        <input type="email" name="email" value="<?php echo $booking['email']; ?>" class="form-control" required>

        <label class="mt-3">Check-in Date:</label>
        <input type="date" name="checkin_date" value="<?php echo $booking['checkin_date']; ?>" class="form-control" required>

        <label class="mt-3">Check-out Date:</label>
        <input type="date" name="checkout_date" value="<?php echo $booking['checkout_date']; ?>" class="form-control" required>

        <label class="mt-3">Number of Guests:</label>
        <input type="number" name="guests" value="<?php echo $booking['guests']; ?>" class="form-control" min="1" required>

        <label class="mt-3">Room Type:</label>
        <select name="room_type" class="form-control" required>
            <option value="single" <?php if ($booking['room_type']=="single") echo "selected"; ?>>Single Room</option>
            <option value="double" <?php if ($booking['room_type']=="double") echo "selected"; ?>>Double Room</option>
            <option value="suite" <?php if ($booking['room_type']=="suite") echo "selected"; ?>>Suite</option>
        </select>

        <label class="mt-3">Special Requests:</label>
        <input type="text" name="special_requests" value="<?php echo $booking['special_requests']; ?>" class="form-control">

        <button type="submit" class="btn btn-primary mt-4 w-100">Update Booking</button>
    </form>
</div>

</body>
</html>
