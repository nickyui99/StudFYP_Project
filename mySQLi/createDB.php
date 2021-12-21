<?php

//First, connect to the MySQL server.
//mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

$link = mysqli_connect("localhost", "root", "");
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}

//Then, create a database named �mydatabase�.
//mysqli_query("$link", "CREATE DATABASE mydatabase") or die(mysqli_error($link));

$sql = "CREATE DATABASE studfyp_db";

if (mysqli_query($link, $sql)) {
    echo "Database created successfully\n";
} else {
    echo 'Error creating database: ' . mysqli_error($link) . "\n";
}

//And finally we close the connection to the MySQL server
mysqli_close($link);
?>