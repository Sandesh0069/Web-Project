<?php
// Include the database connection file
require_once 'db.php';
// Initialize message variable
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email']) && !empty($_POST['password'])) {
    // Get form data
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Prepare and execute SQL insert statement
    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute()) {
        // Success message with link to login
        $message = "Registered successfully. <a href='login.php'>Login here</a>";
    } else {
        // Error message for duplicate email or other issues
        $message = "Error: Email may already be registered.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to CSS file -->
</head>
<body>
    <form method="post">
        <h2>Register</h2>
        <?php if ($message) echo "<p>$message</p>"; // Display message if set ?>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>