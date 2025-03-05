<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $destination = $_POST['destination'];
    $package = $_POST['package'];
    $people = $_POST['people'];
    $date = $_POST['date'];
    $preference = $_POST['preferences'];
    $budget = $_POST['budget'];
    $pickup = $_POST['pickup'];

    // Insert data into fbdata table
    $sql = "INSERT INTO fbdata (name, mobile, email, destination, package, people, date, preference, budget, pickup)
            VALUES ('$name', '$mobile', '$email', '$destination', '$package', '$people', '$date', '$preference', '$budget', '$pickup')";

    if ($conn->query($sql) === TRUE) {
        $message = "Form submitted successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $message = "No form data submitted.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <h2 style="color: <?= strpos($message, 'Error') === false ? 'green' : 'red' ?>;">
        <?= $message ?>
    </h2>

    <?php if (!empty($_POST)): ?>
        <h3>Booking Details:</h3>
        <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
        <p><strong>Mobile:</strong> <?= htmlspecialchars($mobile) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
        <p><strong>Destination:</strong> <?= htmlspecialchars($destination) ?></p>
        <p><strong>Package:</strong> <?= htmlspecialchars($package) ?></p>
        <p><strong>People:</strong> <?= htmlspecialchars($people) ?></p>
        <p><strong>Travel Date:</strong> <?= htmlspecialchars($date) ?></p>
        <p><strong>Preferences:</strong> <?= htmlspecialchars($preference) ?></p>
        <p><strong>Budget:</strong> ₹<?= htmlspecialchars($budget) ?></p>
        <p><strong>Pickup Location:</strong> <?= htmlspecialchars($pickup) ?></p>
    <?php endif; ?>
</body>
</html>
