<?php
include "connection.php";
// Replace these credentials with your database details
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform user authentication
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        echo "Login successful!";
        header("Location:welcome.html");
		exit;
    } else {
        echo "<script>alert('Incorrect username or password!'); window.location.href='ind.php';</script>";
        // echo "Invalid username or password.";
        exit;
    }
}
// Close the database connection
$conn->close(); 
            
?>

