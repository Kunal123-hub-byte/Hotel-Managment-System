<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cancellation / Refund Request</title>
  <link rel="stylesheet" href="style.css"> <!-- Same CSS as signup -->
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

  <div class="form-container">
    <h2>Cancellation / Refund Request Form</h2>

    <form action="submit_cancellation.php" method="POST">
      
      <label for="booking_id">Booking ID:</label>
      <input type="text" id="booking_id" name="booking_id" required>
      
      <label for="name">Full Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email" required>

      <label for="phone">Phone Number:</label>
      <input type="text" id="phone" name="phone" required>

      <label for="reason">Reason for Cancellation:</label>
      <select id="reason" name="reason" required>
        <option value="">-- Select Reason --</option>
        <option value="change_of_plans">Change of Plans</option>
        <option value="medical_emergency">Medical Emergency</option>
        <option value="travel_issues">Travel Issues</option>
        <option value="other">Other</option>
      </select>

      <label for="refund_method">Preferred Refund Method:</label>
      <select id="refund_method" name="refund_method" required>
        <option value="">-- Select Method --</option>
        <option value="bank_transfer">Bank Transfer</option>
        <option value="credit_card">Credit Card</option>
        <option value="wallet">Hotel Wallet Credit</option>
      </select>

      <label for="message">Additional Comments:</label>
      <textarea id="message" name="message" rows="4"></textarea>

      <button type="submit" class="btn">Submit Request</button>
    </form>
  </div>

</body>
</html>
