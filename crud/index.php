<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM library ORDER BY id DESC");
?>
<html>
<head>    
    <title>Homepage</title>
</head>
<body>
<a href="add.php">Add New Data</a><br/><br/>
<table width='80%' border=1>
<tr>
    <th>Name</th> <th>Category</th> <th>Publisher</th> <th>Count</th> <th>Picture</th> <th>Update</th>
</tr>
<?php 
while($res = mysqli_fetch_array($result)) {         
    echo "<tr>";
    echo "<td>".$res['name']."</td>";
    echo "<td>".$res['category']."</td>";
    echo "<td>".$res['publisher']."</td>";
    echo "<td>".$res['count']."</td>";
    echo "<td><img src='picture/".$res['picture']."' width='50'></td>";
    echo "<td>
            <a href='edit.php?id=".$res['id']."'>Edit</a> | 
            <a href='delete.php?id=".$res['id']."' onClick=\"return confirm('Are you sure?')\">Delete</a>
          </td>";
    echo "</tr>";
}
?>
</table>
</body>
</html>
