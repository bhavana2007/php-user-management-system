<?php

include "connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST['name'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    // Check if email already exists
    $check =
    "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($conn, $check);

    if(mysqli_num_rows($result) > 0){

        echo "<script>

                alert('Email already registered!');

                window.location.href='index.php';

              </script>";

        exit();
    }

    // Password Validation
    $pattern =
    "/^(?=.*[A-Z])(?=.*[0-9])(?=.*[\W]).{8,}$/";

    if(!preg_match($pattern, $password)){

        echo "<script>

                alert(
                'Password must contain:\\n\\n' +
                '• Minimum 8 characters\\n' +
                '• One uppercase letter\\n' +
                '• One number\\n' +
                '• One special character'
                );

                window.location.href='index.php';

              </script>";

        exit();
    }

    // Encrypt Password
    $hashed_password =
        password_hash($password, PASSWORD_DEFAULT);

    // Insert Query
    $sql =
    "INSERT INTO users(name, email, password)
     VALUES('$name', '$email', '$hashed_password')";

    if(mysqli_query($conn, $sql)){

        echo "<script>

                alert('Registration Successful!');

                window.location.href='index.php';

              </script>";

    } else {

        echo "Error: " . mysqli_error($conn);
    }
}

?>