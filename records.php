<?php

$conn = mysqli_connect("localhost", "root", "", "record_app");

$result = mysqli_query($conn, "SELECT * FROM users");

echo "<table border='1' cellpadding='10'>";
echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
      </tr>";

while($row = mysqli_fetch_assoc($result))
{
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['phone']."</td>";
    echo "<td>
            <a href='edit.php?id=".$row['id']."'>Edit</a> |
            <a href='delete.php?id=".$row['id']."'
               onclick=\"return confirm('Delete this record?')\">
               Delete
            </a>
          </td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);

?>