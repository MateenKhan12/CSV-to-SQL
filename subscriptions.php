<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription System</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Subscribe for Unlimited File Conversions</h2>
        <form action="process_subscription.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <button type="submit" class="buy-button">Buy Subscription ($5)</button>
        </form>
        <?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get user data from the form
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Simulate a successful payment (for testing purposes)
    $paymentStatus = "success";

    if ($paymentStatus === "success") {
        // Subscription purchased successfully
        echo "Thank you, $name! You have successfully purchased the subscription for unlimited file conversions.";
    } else {
        // Payment failed
        echo "Payment failed. Please try again later.";
    }
} else {
    // Redirect to the subscription page if accessed directly without POST data
    header("Location: index.html");
}
?>

    </div>
</body>

</html>
