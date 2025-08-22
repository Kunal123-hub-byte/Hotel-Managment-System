<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get the ID from URL and ensure it's an integer

    // Delete query
    $sql = "DELETE FROM cancellations WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cancellation request deleted successfully.'); window.location.href='view_cancellations.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='view_cancellations.php';</script>";
}

$conn->close();
?>
