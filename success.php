<?php
if (isset($_GET['payment_id'])) {
    $paymentId = htmlspecialchars($_GET['payment_id']);
    echo "<h1>Thank You!</h1>";
    echo "<p>Your donation was successful. Payment ID: $paymentId</p>";
} else {
    echo "<h1>Payment Failed</h1>";
}