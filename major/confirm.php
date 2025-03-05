<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
} else {
    echo "Form not submitted!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - Flashtrip</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #1A2238;">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="index.html">Flashtrip</a>
        </div>
    </nav>

    <div class="container py-5 text-center">
        <h2 class="display-4 fw-bold text-success text-black">Booking Confirmed!</h2>
        <p class="lead">Thank you for booking your dream trip with Flashtrip.</p>

        <div class="card mx-auto mt-4" style="max-width: 600px;">
            <div class="card-body">
                <h5 class="card-title">Booking Details</h5>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($_POST['name']); ?></p>
                <p><strong>Mobile:</strong> <?php echo htmlspecialchars($_POST['mobile']); ?></p>
                <p><strong>Destination:</strong> <?php echo htmlspecialchars($_POST['destination']); ?></p>
                <p><strong>Package:</strong> <?php echo htmlspecialchars($_POST['package']); ?></p>
                <p><strong>Travel Date:</strong> <?php echo htmlspecialchars($_POST['date']); ?></p>
                <p><strong>People:</strong> <?php echo htmlspecialchars($_POST['people']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($_POST['email']); ?></p>
                <p><strong>Preferences:</strong> <?php echo htmlspecialchars($_POST['preferences']); ?></p>
                <p><strong>Budget:</strong> $<?php echo htmlspecialchars($_POST['budget']); ?></p>
                <p><strong>Pickup Location:</strong> <?php echo htmlspecialchars($_POST['pickup']); ?></p>
            </div>
        </div>

        <a href="index.html" class="btn btn-primary mt-4">Back to Home</a>
    </div>
</body>
</html>



