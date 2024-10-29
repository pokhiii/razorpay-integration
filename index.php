<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Razorpay Integration</title>
</head>
<body>
  <h1>Donate to Our NGO</h1>
  <form action="process_payment.php" method="POST">
    <label>Amount (INR):</label>
    <input type="number" name="amount" required>
    <button type="submit">Pay with Razorpay</button>
  </form>
</body>
</html>
