<?php

session_start();

include "connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check email
    $sql = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        // Verify password
        if(password_verify($password, $row['password'])){

            $_SESSION['user_name'] = $row['name'];

            header("Location: dashboard.php");

        } else {

            echo "<script>
                    alert('Wrong Password!');
                    window.location.href='index.php';
                  </script>";
        }

    } else {

        echo "<script>
                alert('User not found!');
                window.location.href='index.php';
              </script>";
    }
}

?>