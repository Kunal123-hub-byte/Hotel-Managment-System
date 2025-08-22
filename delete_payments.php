<?php
include 'db.php';

// Check if payment ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Payment ID is missing.");
}

$payment_id = intval($_GET['id']);

// Delete payment record
$sql = "DELETE FROM payments WHERE id = $payment_id";

if ($conn->query($sql) === TRUE) {
    // Redirect back to view payments page after deletion
    header("Location: view_payments.php");
    exit;
} else {
    echo "Error deleting payment: " . $conn->error;
}
?>
