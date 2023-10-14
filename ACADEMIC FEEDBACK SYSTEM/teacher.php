<?php
$title = "home";
$page = "home";
include_once("nav.html")
    ?>
<?php

include 'view.php';
if (isset($_POST['SUBMIT'])) {
    $PROGRAM = $_POST['PROGRAM'];
    $TEACHER_NAME = $_POST['TEACHER_NAME'];
    $TEACHER_ID = $_POST['TEACHER_ID'];
    

        $fname = $_FILES['img']['name'];
        $tname = $_FILES['img']['tmp_name'];
        $folder = "upload/".$fname;

        move_uploaded_file($tname, $folder);

    /*$sql = "INSERT INTO teacher (PROGRAM, TEACHER NAME, TEACHER ID, PCODE) VALUES (?,?,?,?);";*/
    $sql = "INSERT INTO teacher (PROGRAM, TEACHER_NAME, TEACHER_ID, TEACHER_IMG) VALUES (?, ?, ?,?);";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$PROGRAM, $TEACHER_NAME, $TEACHER_ID, $folder]);

}

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
    <a href="teacherview.php" class="v">View</a>
    <div class="panel-body" style="display: flex;justify-content: center;">

        <form action="teacher.php" method="post" enctype="multipart/form-data">
            <div>
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
            </div>
            <div class="form-group">
                <label for="TEACHER_NAME">TEACHER&nbsp;NAME</label>
                <input type="text" class="form-control" id="TEACHER_NAME" name="TEACHER_NAME"
                    placeholder="TEACHER&nbsp;NAME...." />
            </div>

            <div>
                <label for="TEACHER_ID">TEACHER ID</label>
                <input type="text" class="form-control" id="TEACHER_ID" name="TEACHER_ID"
                    placeholder="TEACHER&nbsp;ID...." />
            </div>

            <label for="TEACHER_PASSWORD">IMAGE</label>
            <input type="file" name="img" accept=".jpg, .jpeg, .png">

            <div>
                <input type="SUBMIT" name="SUBMIT" class="btn">
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['SUBMIT']))
        if ($result) {
            $fname = $_FILES['img']['name'];
            $tname = $_FILES['img']['tmp_name'];
            $folder = "upload/".$fname;


            ?>
            <div style="display: flex; justify-content: center; padding-right: 70px;">
                <table>
                    <tr>
                        <th>PROGRAM</th>
                        <th>TEACHER NAME</th>
                        <th>TEACHER ID</th>
                        <th>TEACHER IMAGE</th>
                    </tr>
                    <tr>
                        <td>
                            <?= $PROGRAM ?>
                        </td>
                        <td>
                            <?= $TEACHER_NAME ?>
                        </td>
                        <td>
                            <?= $TEACHER_ID ?>
                        </td>
                        <td>
                            <img src="<?= $folder ?>" height='100px' width='100'>
                        </td>
                    </tr>
                </table>
            </div>
            <?php
        }
    ?>
</body>

</html>