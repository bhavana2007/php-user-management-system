<?php

session_start();

include "connect.php";

// Check session
if(!isset($_SESSION['user_name'])){

    header("Location: index.php");

    exit();
}

$user =
$_SESSION['user_name'];

// Check if user still exists
$sql =
"SELECT * FROM users
 WHERE name='$user'";

$result =
mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){

    session_destroy();

    header("Location: index.php");

    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Dashboard</title>

    <style>

        body{
            margin:0;

            font-family: Arial;

            background: linear-gradient(135deg, #0f172a, #1e293b);

            color:white;

            display:flex;
            justify-content:center;
            align-items:center;

            height:100vh;
        }

        .dashboard{

            text-align:center;

            background: rgba(255,255,255,0.08);

            padding:40px;

            border-radius:15px;

            backdrop-filter: blur(15px);
        }

        a{

            display:inline-block;

            margin-top:20px;

            text-decoration:none;

            background:#38bdf8;

            color:black;

            padding:10px 20px;

            border-radius:6px;
        }

    </style>

</head>

<body>

<div class="dashboard">

    <h1>
        Welcome
        <?php echo $_SESSION['user_name']; ?>
    </h1>

    <p>
    Login Successful
</p>

<a href="view_users.php">
    View Users
</a>

<br><br>

<a href="logout.php">
    Logout
</a>

</div>

</body>
</html>