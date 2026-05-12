<?php

session_start();

include "connect.php";

// Check login
if(!isset($_SESSION['user_name'])){

    header("Location: index.php");

    exit();
}

// Get user id
$id = $_GET['id'];

// Delete query
$sql = "DELETE FROM users WHERE id='$id'";

if(mysqli_query($conn, $sql)){

    header("Location: view_users.php");

} else {

    echo "Error deleting user.";
}

?>