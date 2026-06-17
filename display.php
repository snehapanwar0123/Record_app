<?php

$conn = mysqli_connect("localhost","root","","record_app");

if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn,"SELECT * FROM users ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>
<head>

<title>User Records</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f4f4;
}

.record-box{
    width:95%;
    margin:30px auto;
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0px 0px 10px gray;
}

</style>

</head>

<body>

<div class="record-box">

<div class="d-flex justify-content-between mb-3">

    <h2>User Records</h2>

    <a href="index.php" class="btn btn-success">
        Add New Record
    </a>

</div>

<table class="table table-bordered table-striped">

<tr class="table-dark">
    <th>ID</th>
    <th>Name</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Country</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Sex</th>
    <th>Course</th>
    <th>Actions</th>
</tr>

<?php

$rows = mysqli_num_rows($result);

if($rows > 0)
{
    for($i = 0; $i < $rows; $i++)
    {
        $row = mysqli_fetch_assoc($result);
?>

<tr>

    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['city']; ?></td>
    <td><?php echo $row['state']; ?></td>
    <td><?php echo $row['country']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['sex']; ?></td>
    <td><?php echo $row['course']; ?></td>

    <td>

        <a href="index.php?id=<?php echo $row['id']; ?>"
           class="btn btn-warning btn-sm">
            Edit
        </a>

        <a href="delete.php?id=<?php echo $row['id']; ?>"
           class="btn btn-danger btn-sm"
           onclick="return confirm('Delete this record?')">
            Delete
        </a>

    </td>

</tr>

<?php
    }
}
else
{
?>

<tr>
    <td colspan="11" class="text-center">
        No Records Found
    </td>
</tr>

<?php
}
?>

</table>

</div>

</body>
</html>

<?php mysqli_close($conn); ?>