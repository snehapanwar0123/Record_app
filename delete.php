<?php

$conn = mysqli_connect("localhost","root","","record_app");

if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM users WHERE id=$id");
}

header("Location: display.php");
exit;

?>