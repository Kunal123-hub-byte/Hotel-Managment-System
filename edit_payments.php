<?php
include 'db.php';

// Check if payment ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Payment ID is missing.");
}

$payment_id = intval($_GET['id']);

// Fetch the payment record
$sql = "SELECT * FROM payments WHERE id = $payment_id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Payment record not found.");
}

$payment = $result->fetch_assoc();

// Update payment if form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $booking_id = intval($_POST['booking_id']);
    $payer_name = mysqli_real_escape_string($conn, $_POST['payer_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $amount = floatval($_POST['amount']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);

    $update_sql = "UPDATE payments 
                   SET booking_id='$booking_id', payer_name='$payer_name', email='$email', amount='$amount', payment_method='$payment_method'
                   WHERE id='$payment_id'";

    if ($conn->query($update_sql) === TRUE) {
        echo "<h3 style='text-align:center;color:green;margin-top:30px;'>Payment updated successfully!</h3>";
        echo "<p style='text-align:center;'><a href='view_payments.php'>Back to Payments</a></p>";
        exit;
    } else {
        echo "Error updating payment: " . $conn->error;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Payment</h2>
    <form method="post" class="border p-4 rounded shadow bg-light">

        <label>Payment ID:</label>
        <input type="text" name="payment_id" value="<?php echo $payment['id']; ?>" class="form-control" readonly>

        <label class="mt-3">Booking ID:</label>
        <input type="number" name="booking_id" value="<?php echo $payment['booking_id']; ?>" class="form-control" required>

        <label class="mt-3">Payer Name:</label>
        <input type="text" name="payer_name" value="<?php echo $payment['payer_name']; ?>" class="form-control" required>

        <label class="mt-3">Email:</label>
        <input type="email" name="email" value="<?php echo $payment['email']; ?>" class="form-control" required>

        <label class="mt-3">Amount:</label>
        <input type="number" name="amount" value="<?php echo $payment['amount']; ?>" step="0.01" min="1" class="form-control" required>

        <label class="mt-3">Payment Method:</label>
        <select name="payment_method" class="form-control" required>
            <option value="Credit Card" <?php if($payment['payment_method']=="Credit Card") echo "selected"; ?>>Credit Card</option>
            <option value="Debit Card" <?php if($payment['payment_method']=="Debit Card") echo "selected"; ?>>Debit Card</option>
            <option value="UPI" <?php if($payment['payment_method']=="UPI") echo "selected"; ?>>UPI</option>
            <option value="Net Banking" <?php if($payment['payment_method']=="Net Banking") echo "selected"; ?>>Net Banking</option>
            <option value="Wallet" <?php if($payment['payment_method']=="Wallet") echo "selected"; ?>>Wallet</option>
        </select>

        <button type="submit" class="btn btn-primary mt-4 w-100">Update Payment</button>
    </form>
</div>
</body>
</html>
