<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "studfyp_db") or die(mysqli_error($link));

//The SQL statement that deletes the record
$strSQL = "DROP DATABASE studfyp_db";

if (mysqli_query($link, $strSQL)) {
    echo "studfyp_db database delete sucessfully <br>";
} else {
    echo 'Error deleting database: ' . mysqli_error($link) . "<br>";
}

//Close the database connection
mysqli_close($link);
?>