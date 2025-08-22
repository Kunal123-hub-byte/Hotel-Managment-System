<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback Form</title>
    <link rel="stylesheet" href="style.css"> <!-- Your existing CSS -->
     <style>
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

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<h2>Customer Feedback / Review Form</h2>

<form action="submit_feedback.php" method="POST" autocomplete="off">
    
    <label for="booking_id">Booking ID:</label>
    <input type="text" id="booking_id" name="booking_id" required>

    <label for="name">Full Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" required>

    <label for="rating">Rating:</label>
    <select id="rating" name="rating" required>
        <option value="">-- Select Rating --</option>
        <option value="5">5 - Excellent</option>
        <option value="4">4 - Very Good</option>
        <option value="3">3 - Good</option>
        <option value="2">2 - Fair</option>
        <option value="1">1 - Poor</option>
    </select>

    <label for="feedback">Feedback / Review:</label>
    <textarea id="feedback" name="feedback" rows="4" style="width:100%; padding:10px; border-radius:6px; border:1px solid #ccc;" required></textarea>

    <button type="submit" class="btn">Submit Feedback</button>
</form>

</body>
</html>

