<?php
include 'db.php';

// Get feedback ID from URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM feedbacks WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $feedback = $result->fetch_assoc();
    } else {
        echo "Feedback not found.";
        exit;
    }
}

// Handle form submission (update)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $booking_id = intval($_POST['booking_id']);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rating = intval($_POST['rating']);
    $feedback_text = $_POST['feedback'];

    $sql = "UPDATE feedbacks 
            SET booking_id='$booking_id', name='$name', email='$email', rating='$rating', feedback='$feedback_text'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Feedback updated successfully!'); window.location.href='view_feedback.php';</script>";
    } else {
        echo "Error updating feedback: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer Feedback</title>
    <link rel="stylesheet" href="style.css"> <!-- Your existing CSS -->
</head>
<body>

<h2>Edit Customer Feedback / Review</h2>

<form action="edit_feedback.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $feedback['id']; ?>">

    <label for="booking_id">Booking ID:</label>
    <input type="text" id="booking_id" name="booking_id" value="<?php echo $feedback['booking_id']; ?>" required>

    <label for="name">Full Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $feedback['name']; ?>" required>

    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" value="<?php echo $feedback['email']; ?>" required>

    <label for="rating">Rating:</label>
    <select id="rating" name="rating" required>
        <option value="5" <?php if($feedback['rating']==5) echo "selected"; ?>>5 - Excellent</option>
        <option value="4" <?php if($feedback['rating']==4) echo "selected"; ?>>4 - Very Good</option>
        <option value="3" <?php if($feedback['rating']==3) echo "selected"; ?>>3 - Good</option>
        <option value="2" <?php if($feedback['rating']==2) echo "selected"; ?>>2 - Fair</option>
        <option value="1" <?php if($feedback['rating']==1) echo "selected"; ?>>1 - Poor</option>
    </select>

    <label for="feedback">Feedback / Review:</label>
    <textarea id="feedback" name="feedback" rows="4" required><?php echo $feedback['feedback']; ?></textarea>

    <button type="submit" class="btn">Update Feedback</button>
</form>

</body>
</html>
