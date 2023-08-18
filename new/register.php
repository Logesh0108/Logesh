<?php
// Replace these credentials with your database details
include "connection.php";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if username's first letter is uppercase and ends with two digits
    if (preg_match('/^[A-Z][A-Za-z]*\d{2}$/', $username)) {
        // Insert user details into the users table
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registered Success !'); window.location.href='ind.php';</script>";
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            exit;
        }
    } else {
        echo "<script>alert('Invalid username format. Username must start with an uppercase letter and end with two digits. !!!'); window.location.href='register.html';</script>";
        // echo "Invalid username format. Username must start with an uppercase letter and end with two digits.";
        exit;
    }
}

// Close the database connection
$conn->close();
?>
