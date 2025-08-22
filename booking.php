<?php
include 'db.php';

$booking_id = ""; // Initialize Booking ID variable
$success_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $checkin_date = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];
    $guests = intval($_POST['guests']);
    $room_type = mysqli_real_escape_string($conn, $_POST['room_type']);
    $special_requests = mysqli_real_escape_string($conn, $_POST['special_requests']);

    $sql = "INSERT INTO bookings (name, phone, email, checkin_date, checkout_date, guests, room_type, special_requests) 
            VALUES ('$name', '$phone', '$email', '$checkin_date', '$checkout_date', '$guests', '$room_type', '$special_requests')";

    if ($conn->query($sql) === TRUE) {
        $booking_id = $conn->insert_id; // <-- This is the new Booking ID
        $success_message = "Booking Successful! Your Booking ID is: " . $booking_id;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Form</title>
    <style>
        /* Keep all your existing CSS */
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 60px auto;
            background: #ffffff;
            padding: 28px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            animation: fadeIn 0.8s ease-in-out;
        }

        h2 {
            text-align: center;
            color: #fff;
            margin-top: 40px;
            text-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            font-size: 28px;
        }

        label {
            display: block;
            margin: 12px 0 6px;
            font-weight: 600;
            color: #444;
        }

        input[type=text],
        input[type=email],
        input[type=date],
        input[type=number],
        select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            transition: all 0.3s ease;
            font-size: 15px;
        }

        input:focus, select:focus {
            border-color: #2575fc;
            box-shadow: 0 0 6px rgba(37, 117, 252, 0.4);
            outline: none;
        }

        .btn {
            margin-top: 20px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
            border: 0;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
            width: 100%;
        }

        .btn:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            transform: scale(1.03);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
        }

        .success-message {
            text-align: center;
            margin: 20px auto;
            padding: 12px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 6px;
            font-weight: bold;
            max-width: 600px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <h2>Booking Form</h2>

    <?php if($success_message != ""): ?>
        <div class="success-message"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <form method="post" action="submit_booking.php" autocomplete="off">
        <?php if($booking_id != ""): ?>
            <label>Booking ID:</label>
            <input type="text" name="booking_id_display" value="<?php echo $booking_id; ?>" readonly>
        <?php endif; ?>

        <label>Full Name:</label>
        <input type="text" name="name" required>

        <label>Phone:</label>
        <input type="text" name="phone" required pattern="[0-9]{10}" maxlength="10">

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Check-in Date:</label>
        <input type="date" name="checkin_date" required>

        <label>Check-out Date:</label>
        <input type="date" name="checkout_date" required>

        <label>Number of Guests:</label>
        <input type="number" name="guests" min="1" required>

        <label>Room Type:</label>
        <select name="room_type" required>
            <option value="">-- Select Room Type --</option>
            <option value="single">Single Room</option>
            <option value="double">Double Room</option>
            <option value="suite">Suite</option>
        </select>

        <label>Special Requests:</label>
        <input type="text" name="special_requests">

        <button type="submit" class="btn">Book Now</button>
    </form>
</body>
</html>
 