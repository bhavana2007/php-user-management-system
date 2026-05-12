<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "portfolio_db",
    3307
);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

?>