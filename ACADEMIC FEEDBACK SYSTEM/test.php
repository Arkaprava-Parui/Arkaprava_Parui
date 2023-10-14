<?php
$title = "home";
$page = "home";
include_once("nav.html")
    ?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="ar.css">

    <title>Document</title>
</head>

<body>
    <div style="display: flex;justify-content: center;">
        <form action="test.php" method="post">
            <label for="gender">PROGRAM</label>
            <select id="PROGRAM" name="PROGRAM" style="margin: 10px">
                <option value="" name="PROGRAM">PLEASE SELECT</option>
                <option value="CSE" name="PROGRAM">B.Tech in CSE</option>
                <option value="IT" name="PROGRAM">B.Tech in IT</option>
                <option value="ECE" name="PROGRAM">B.Tech in ECE</option>
                <option value="EE" name="PROGRAM">B.Tech in EE</option>
                <option value="ME" name="PROGRAM">B.Tech in ME</option>
                <option value="CSE-DS" name="PROGRAM">B.Tech in CSE-DS</option>
            </select>
            <button class="btn" type="submit" name="submit">Submit</button>
            <button class="btn" name="View" type="submit">View</button>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $_SESSION['PROGRAM'] = $_POST['PROGRAM'];
        header("Location: test1.php");
        exit();
    } elseif (isset($_POST['View'])) {
        $_SESSION['PROGRAM'] = $_POST['PROGRAM'];
        header("Location: testview.php");

    }
    ?>

</body>

</html>