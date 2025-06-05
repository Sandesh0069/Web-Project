<?php
     // Start session to check if user is logged in
     session_start();
     // Redirect to login if not logged in
     if (!isset($_SESSION['email'])) {
         header("Location: login.php");
         exit();
     }
     ?>
     <!DOCTYPE html>
     <html>
     <head>
         <title>Dashboard</title>
         <link rel="stylesheet" href="style.css"> <!-- Link to CSS file -->
     </head>
     <body>
         <div>
             <h2>Welcome</h2>
             <p>You are logged in as: <?php echo htmlspecialchars($_SESSION['email']); // Display user email ?></p>
             <a href="logout.php">Logout</a>
         </div>
     </body>
     </html>