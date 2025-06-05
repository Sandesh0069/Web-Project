-- Create a new database named 'project' if it doesn't exist
     CREATE DATABASE IF NOT EXISTS project;
     -- Use the 'project' database
     USE project;

     -- Create a 'users' table to store user credentials
     CREATE TABLE IF NOT EXISTS users (
         id INT AUTO_INCREMENT PRIMARY KEY, -- Auto-incrementing unique ID
         email VARCHAR(100) NOT NULL UNIQUE, -- User's email, must be unique
         password VARCHAR(255) NOT NULL -- Hashed password
     );