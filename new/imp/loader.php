<?php
// login.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform your PHP validation and authentication here
    // For example, check username and password against a database

    if ($username === "valid_username" && $password === "valid_password") {
        // Return a success response
        echo "success";
    } else {
        // Return an error response
        echo "error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* styles.css */

.hidden {
    display: none;
}

#loader {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
}

.spinner {
    border: 4px solid rgba(0, 0, 0, 0.1);
    border-left-color: #09f;
    animation: spin 1s linear infinite;
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

    </style>
</head>
<body>
    <form id="loginForm" action="login.php" method="post">
        <!-- Your form fields here -->
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" id="loginButton">Login</button>
    </form>
    
    <div id="loader" class="hidden">
        <div class="spinner"></div>
    </div>

    <script >
        // script.js

// script.js

document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("loginForm");
    const loginButton = document.getElementById("loginButton");
    const loader = document.getElementById("loader");

    loginForm.addEventListener("submit", function (event) {
        event.preventDefault();

        // Perform your form validation here
        const username = loginForm.username.value;
        const password = loginForm.password.value;

        if (username && password) {
            // Hide login form and show loader
            loginForm.style.display = "none";
            loader.classList.remove("hidden");

            // Simulate server-side processing with a delay (replace with your actual AJAX request)
            setTimeout(function () {
                // Once processing is done, hide loader and show login form
                loader.classList.add("hidden");
                loginForm.style.display = "block";

                // You can redirect the user or perform other actions here
                alert("Login successful!");
            }, 2000);
        } else {
            alert("Please fill in both fields.");
        }
    });
});


    </script>
</body>
</html>
