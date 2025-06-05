<?php
     // Include the database connection file
     require_once 'db.php';
     // Start a session to manage user login
     session_start();
     // Initialize message variable
     $message = '';

     if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email']) && !empty($_POST['password'])) {
         // Get form data
         $email = $_POST['email'];
         $password = $_POST['password'];

         // Prepare and execute SQL query to find user
         $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
         $stmt->bind_param("s", $email);
         $stmt->execute();

         $result = $stmt->get_result();
         $user = $result->fetch_assoc();

         // Verify password and start session if valid
         if ($user && password_verify($password, $user['password'])) {
             $_SESSION['email'] = $user['email'];
             header("Location: dashboard.php");
             exit();
         } else {
             // Error message for invalid credentials
             $message = "Invalid email or password.";
         }
     }
     ?>
     <!DOCTYPE html>
     <html>
     <head>
         <title>Login</title>
         <link rel="stylesheet" href="style.css"> <!-- Link to CSS file -->
     </head>
     <body>
         <form method="post">
             <h2>Login</h2>
             <?php if ($message) echo "<p>$message</p>"; // Display message if set ?>
             <input type="email" name="email" placeholder="Email" required>
             <input type="password" name="password" placeholder="Password" required>
             <button type="submit">Login</button>
         </form>
     </body>
     </html>