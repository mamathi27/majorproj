<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "myproject";

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is received
if (!isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    die("Form data missing!");
}

// Get form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing for security

// Check if username or email already exists
$check_sql = "SELECT * FROM users WHERE username = ? OR email = ?";
$stmt = $conn->prepare($check_sql);
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<script>alert('Username or Email already exists!'); window.location.href='signup.html';</script>";
} else {
    // Insert new user
    $insert_sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Signup successful! Please login.'); window.location.href='login.html';</script>";
    } else {
        echo "<script>alert('Error during signup. Please try again.');</script>";
    }
}

$stmt->close();
$conn->close();
?>