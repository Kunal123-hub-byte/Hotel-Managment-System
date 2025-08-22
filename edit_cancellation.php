<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM cancellations WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found.";
        exit;
    }
}

// Handle form submission (update)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $booking_id = $_POST['booking_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $reason = $_POST['reason'];
    $refund_method = $_POST['refund_method'];
    $message = $_POST['message'];

    $sql = "UPDATE cancellations 
            SET booking_id='$booking_id', name='$name', email='$email', phone='$phone', 
                reason='$reason', refund_method='$refund_method', message='$message' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cancellation request updated successfully!'); window.location.href='view_cancellations.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Cancellation Request</title>
  <link rel="stylesheet" href="style.css"> <!-- Your existing CSS -->
</head>
<body>
  <h2>Edit Cancellation / Refund Request</h2>

  <form action="edit_cancellation.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label for="booking_id">Booking ID:</label>
    <input type="text" id="booking_id" name="booking_id" value="<?php echo $row['booking_id']; ?>" required>

    <label for="name">Full Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>

    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

    <label for="phone">Phone Number:</label>
    <input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required>

    <label for="reason">Reason for Cancellation:</label>
    <select id="reason" name="reason" required>
      <option value="change_of_plans" <?php if($row['reason']=="change_of_plans") echo "selected"; ?>>Change of Plans</option>
      <option value="medical_emergency" <?php if($row['reason']=="medical_emergency") echo "selected"; ?>>Medical Emergency</option>
      <option value="travel_issues" <?php if($row['reason']=="travel_issues") echo "selected"; ?>>Travel Issues</option>
      <option value="other" <?php if($row['reason']=="other") echo "selected"; ?>>Other</option>
    </select>

    <label for="refund_method">Preferred Refund Method:</label>
    <select id="refund_method" name="refund_method" required>
      <option value="bank_transfer" <?php if($row['refund_method']=="bank_transfer") echo "selected"; ?>>Bank Transfer</option>
      <option value="credit_card" <?php if($row['refund_method']=="credit_card") echo "selected"; ?>>Credit Card</option>
      <option value="wallet" <?php if($row['refund_method']=="wallet") echo "selected"; ?>>Hotel Wallet Credit</option>
    </select>

    <label for="message">Additional Comments:</label>
    <textarea id="message" name="message" rows="4"><?php echo $row['message']; ?></textarea>

    <button type="submit" class="btn">Update Request</button>
  </form>
</body>
</html>
