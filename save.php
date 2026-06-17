<?php

$conn = mysqli_connect("localhost","root","","record_app");

if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$name    = $_POST['name'];
$address = $_POST['address'];
$city    = $_POST['city'];
$state   = $_POST['state'];
$country = $_POST['country'];
$email   = $_POST['email'];
$phone   = $_POST['phone'];
$sex     = $_POST['sex'];
$course  = $_POST['course'];

if(isset($_POST['id']) && $_POST['id'] != "")
{
    $id = $_POST['id'];

    $sql = "UPDATE users SET
            name='$name',
            address='$address',
            city='$city',
            state='$state',
            country='$country',
            email='$email',
            phone='$phone',
            sex='$sex',
            course='$course'
            WHERE id=$id";
}
else
{
    $sql = "INSERT INTO users
            (name,address,city,state,country,email,phone,sex,course)
            VALUES
            ('$name','$address','$city','$state','$country',
             '$email','$phone','$sex','$course')";
}

$result = mysqli_query($conn,$sql);

if(!$result)
{
    die("MySQL Error: " . mysqli_error($conn));
}

header("Location: display.php");
exit;

?>