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
        echo "<script>
                  setTimeout(function() {
                      window.location.href = 'welcome.html';
                  }); // Redirect after 3 seconds
              </script>";
    } else {
        echo "<script>
                  alert('Incorrect username or password!');
                  window.location.href = 'ind.php';
              </script>";
    }

    // Hide the loader
    echo "<script>document.getElementById('loader-container').style.display = 'none';</script>";

    // if ($result->num_rows == 1) {
    //     echo "Login successful!";
    //     header("Location:welcome.html");
	// 	exit;
    // } else {
    //     echo "<script>alert('Incorrect username or password!'); window.location.href='ind.php';</script>";
    //     // echo "Invalid username or password.";
    //     exit;
    // }
}
// Close the database connection
$conn->close(); 
            
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="ind.css">
    <script src="ind.js"></script>
    <style>
        /* Styles for the login form */
        body {
            font-family: Arial, sans-serif;
            background-color:orange;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transform: translateY(-20px);
            opacity: 0;
            animation: fadeInUp 2.5s ease forwards, bounce .5s ease infinite alternate;
        }

        @keyframes fadeInUp {
            to {
                transform: translateY(0);
                opacity: 11;
            }
        }

        @keyframes bounce {
            to {
                transform: translateY(-15px);
            }
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #00b32a;
        }
        a{
            text-align: center;
            text-decoration: none;
            color:black ;
        }
        a:hover{  
            color: orangered;
            transition: 2ms;
        }
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        
        .login-container {
    text-align: center;
    margin: 100px auto;
}



    </style>
</head>
<body >

    
    <div class="login-container">
        <h2>Login Form</h2>
        <form action="" method="post" onsubmit="return validateForm()">
    <!-- ... your form fields ... -->

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required  placeholder="Password">
            </div>
            <button type="submit">Login</button>
            <p class="error-message" id="error-message"></p>
            <p style="text-align: center; color:grey;">Don't Have an Account ?</p>
            <a href="register.html"><H2>Register Here</H2></a>
            
    
    
    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var errorMessage = document.getElementById("error-message");

            if (username === "" || password === "") {
                errorMessage.textContent = "Both fields are required.";
                return false;
            }

            return true;
        }
        
      

    
    </script>
</body>
</html>
