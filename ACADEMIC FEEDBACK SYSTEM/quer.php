<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>upload</title>
</head>
<body>
    <form action="quer.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="img" accept=".jpg, .jpeg, .png">
        <input type="submit" name="submit" >
    </form>
</body>
</html>
<?php

$fname = $_FILES['img']['name'];
$tname = $_FILES['img']['tmp_name'];
$folder = "upload/".$fname;

print_r($_FILES["img"] );

move_uploaded_file($tname, $folder);
?>