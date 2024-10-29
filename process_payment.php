<?php
require 'vendor/autoload.php';

use Razorpay\Api\Api;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiKey = $_ENV['RAZORPAY_KEY'];
$apiSecret = $_ENV['RAZORPAY_SECRET'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount'] * 100;
    $api = new Api($apiKey, $apiSecret);

    // Create an order on Razorpay
    $order = $api->order->create([
        'receipt' => 'RCPT-' . uniqid(),
        'amount' => $amount,
        'currency' => 'INR',
        'payment_capture' => 1
    ]);

    // Pass order details to the checkout page
    $orderData = [
        'key' => $apiKey,
        'order_id' => $order->id,
        'amount' => $amount,
        'currency' => 'INR'
    ];

    // Encode data for the checkout script
    $encodedData = json_encode($orderData);
} else {
    die("Invalid request");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Complete Payment</title>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
  <h1>Complete Payment</h1>
  <button id="rzp-button1">Pay Now</button>

  <script>
    // Parse PHP data
    var options = <?= $encodedData; ?>;

    // Razorpay options and success callback
    options.handler = function (response){
      alert("Payment successful with Payment ID: " + response.razorpay_payment_id);
      window.location.href = "success.php?payment_id=" + response.razorpay_payment_id;
    };

    var rzp = new Razorpay(options);

    document.getElementById('rzp-button1').onclick = function(e){
      rzp.open();
      e.preventDefault();
    }
  </script>
</body>
</html>