<?php

session_start();

if(isset($_SESSION['user_name'])){

    header("Location: dashboard.php");

    exit();
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Login & Register</title>

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<div class="container">

    <div class="form-box">

        <h2 id="title">Login</h2>

        <!-- IMPORTANT CHANGE HERE -->
        <form id="form" action="login.php" method="POST">

            <!-- Name -->
            <input type="text"
                   id="name"
                   name="name"
                   placeholder="Name"
                   style="display:none">

            <!-- Email -->
            <input type="email"
                   id="email"
                   name="email"
                   placeholder="Email"
                   required>

            <!-- Password -->
            <div class="password-box">

                <input type="password"
                       id="password"
                       name="password"
                       placeholder="Password"
                       required>

                <i class="fa-solid fa-eye eye-icon"
                   onclick="togglePassword()"></i>

            </div>

            <!-- Confirm Password -->
            <input type="password"
                   id="confirmPassword"
                   placeholder="Confirm Password"
                   style="display:none">

            <!-- Button -->
            <button type="submit" id="submitBtn">
                Login
            </button>

        </form>

        <p>
            <span onclick="showRegister()">
                Register
            </span>

            |

            <span onclick="showLogin()">
                Login
            </span>
        </p>

    </div>

</div>

<script src="script.js"></script>

</body>
</html>