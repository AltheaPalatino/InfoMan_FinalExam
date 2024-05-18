<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Result</title>
</head>
<body>
    <h1>Order Result</h1>

    <?php
    session_start();

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process form data
        $item = $_POST['item'];
        $quantity = $_POST['quantity'];
        $cash = $_POST['cash'];

        // Get username from the session
        $username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest';

        // Calculate total price
        $price = 0;
        switch ($item) {
            case 'donut':
                $price = 25;
                break;
            case 'kikiam':
                $price = 20;
                break;
            case 'milktea':
                $price = 49;
                break;
            default:
                // Handle invalid item
                break;
        }

        $total = $price * $quantity;

        // Display total cost
        echo "<p>Total cost: $total PHP</p>";

        // Check if cash is enough
        if ($cash >= $total) {
            $change = $cash - $total;
            echo "<p>Your change is: $change PHP</p>";
            echo "<p>Thank you for your order, $username!</p>";
        } else {
            $remaining = $total - $cash;
            echo "<p>Sorry, you don't have enough cash.</p>";
            echo "<p>Please add $remaining PHP.</p>";
        }
    } else {
        // Redirect to the order form if accessed directly
        header("Location: form.html");
        exit();
    }
    ?>

    <button><a href="index.php">Back to Order form</a></button>

</body>
</html>
