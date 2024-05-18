<?php 
session_start();

if(!isset($_SESSION['username'])) {
	header('Location: login.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Welcome to the canteen, <?php echo $_SESSION['username'];?></h1>
	 <h4>Here are the prices</h4>
    <ul>
        <li>Donut - 25 PHP</li>
        <li>Kikiam - 20 PHP</li>
        <li>Milktea - 49 PHP</li>
    </ul>
    <form id="orderForm" action="result.php" method="POST">
        <!-- Dropdown to choose the item -->
        <label for="item">Choose your order:</label>
        <select name="item" id="item">
            <option value="donut">Donut - 25 PHP</option>
            <option value="kikiam">Kikiam - 20 PHP</option>
            <option value="milktea">Milktea - 49 PHP</option>
        </select><br><br>
        
        <!-- Input for quantity -->
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" min="1" required><br><br>
        <!-- Input for cash -->
        <label for="cash">Cash:</label>
        <input type="number" name="cash" id="cash" required><br><br>
        <button type="submit">Submit</button>
    </form>
	<a href="logout.php">Logout</a>
</body>
</html>