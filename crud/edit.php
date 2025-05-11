<?php
include_once("config.php");
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $publisher = $_POST['publisher'];
    $count = $_POST['count'];
    $result = mysqli_query($mysqli, "UPDATE library SET name='$name',category='$category',
    publisher='$publisher',count='$count' WHERE id=$id");
    header("Location: index.php");
}
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM library WHERE id=$id");
while($res = mysqli_fetch_array($result)) {
    $name = $res['name'];
    $category = $res['category'];
    $publisher = $res['publisher'];
    $count = $res['count'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
<body>
    <form name="form1" method="post" action="edit.php">
        <table>
            <tr><td>Name</td><td><input type="text" name="name" value="<?php echo $name;?>"></td></tr>
            <tr><td>Category</td><td><input type="text" name="category" value="<?php echo $category;?>"></td></tr>
            <tr><td>Publisher</td><td><input type="text" name="publisher" value="<?php echo $publisher;?>"></td></tr>
            <tr><td>Count</td><td><input type="text" name="count" value="<?php echo $count;?>"></td></tr>
            <tr><td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="update" value="Update"></td></tr>
        </table>
    </form>
</body>
</html>