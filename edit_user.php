<?php

session_start();

include "connect.php";

if(!isset($_SESSION['user_name'])){

    header("Location: index.php");

    exit();
}

$id = $_GET['id'];

// Fetch existing user
$sql = "SELECT * FROM users WHERE id='$id'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

// Update
if(isset($_POST['update'])){

    $name = $_POST['name'];

    $email = $_POST['email'];

    $update =
    "UPDATE users
     SET name='$name', email='$email'
     WHERE id='$id'";

    if(mysqli_query($conn, $update)){

        header("Location: view_users.php");
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit User</title>

    <style>

        body{

            font-family: Arial;

            background:#0f172a;

            color:white;

            display:flex;

            justify-content:center;

            align-items:center;

            height:100vh;
        }

        .box{

            background:rgba(255,255,255,0.08);

            padding:30px;

            border-radius:15px;

            width:300px;
        }

        input{

            width:100%;

            padding:10px;

            margin:10px 0;

            border:none;

            border-radius:5px;
        }

        button{

            width:100%;

            padding:10px;

            background:#38bdf8;

            border:none;

            border-radius:5px;

            cursor:pointer;
        }

    </style>

</head>

<body>

<div class="box">

<h2>Edit User</h2>

<form method="POST">

    <input type="text"
           name="name"
           value="<?php echo $row['name']; ?>"
           required>

    <input type="email"
           name="email"
           value="<?php echo $row['email']; ?>"
           required>

    <button type="submit" name="update">

        Update

    </button>

</form>

</div>

</body>
</html>