<?php
include_once("config.php");
if(isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $publisher = $_POST['publisher'];
    $count = $_POST['count'];
    $picture = $_FILES['picture']['name'];
    $file_tmp = $_FILES['picture']['tmp_name'];
    move_uploaded_file($file_tmp, "picture/".$picture);
    $result = mysqli_query($mysqli, "INSERT INTO library(name,category,publisher,count,picture) 
    VALUES('$name','$category','$publisher','$count','$picture')");
    header("Location: index.php");
}
?>
<html>
<head>
    <title>Add Data</title>
</head>
<body>
    <form action="add.php" method="post" enctype="multipart/form-data">
        <table>
            <tr><td>Name</td><td><input type="text" name="name"></td></tr>
            <tr><td>Category</td><td><input type="text" name="category"></td></tr>
            <tr><td>Publisher</td><td><input type="text" name="publisher"></td></tr>
            <tr><td>Count</td><td><input type="text" name="count"></td></tr>
            <tr><td>Picture</td><td><input type="file" name="picture"></td></tr>
            <tr><td><input type="submit" name="Submit" value="Add"></td></tr>
        </table>
    </form>
</body>
</html>