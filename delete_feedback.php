<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get the feedback ID from URL

    // Delete the feedback record
    $sql = "DELETE FROM feedbacks WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Feedback deleted successfully.'); window.location.href='view_feedback.php';</script>";
    } else {
        echo "Error deleting feedback: " . $conn->error;
    }

} else {
    echo "<script>alert('Invalid request.'); window.location.href='view_feedback.php';</script>";
}

$conn->close();
?>
