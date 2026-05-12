<?php

session_start();

include "connect.php";

if(!isset($_SESSION['user_name'])){

    header("Location: index.php");

    exit();
}

$sql = "SELECT * FROM users";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

    <title>View Users</title>

    <style>

        body{

            font-family: Arial;

            background: #0f172a;

            color:white;

            padding:40px;
        }

        table{

            width:100%;

            border-collapse: collapse;

            background:white;

            color:black;
        }

        th, td{

            padding:12px;

            border:1px solid gray;

            text-align:center;
        }

        th{

            background:#38bdf8;
        }

        a{

            text-decoration:none;

            background:red;

            color:white;

            padding:6px 12px;

            border-radius:5px;
        }

    </style>

</head>

<body>

<h1>Registered Users</h1>

<table>

<tr>

    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Actions</th>

</tr>

<?php

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

    <td>
        <?php echo $row['id']; ?>
    </td>

    <td>
        <?php echo $row['name']; ?>
    </td>

    <td>
        <?php echo $row['email']; ?>
    </td>

   <td>

    <a href="edit_user.php?id=<?php echo $row['id']; ?>"
       style="background:green;">

       Edit

    </a>

    <br><br>

    <a href="delete_user.php?id=<?php echo $row['id']; ?>"
       onclick="return confirm('Are you sure?')">

       Delete

    </a>

</td>

</tr>

<?php
}
?>

</table>

</body>
</html>