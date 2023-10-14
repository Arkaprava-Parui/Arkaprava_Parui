<?php
session_start();
error_reporting(0)
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
    <a href="logout.php">Logout</a>
    <h1>
        <?= $_SESSION['designation'] ?> REGISTER
    </h1>
    <div style="display: flex ; justify-content: center;">
        <form action="register.php" method="post" enctype="multipart/form-data">

            <label for="TEACHER_NAME">TEACHER&nbsp;NAME</label>
            <input type="text" class="form-control" id="TEACHER_NAME" name="TEACHER_NAME"
                placeholder="TEACHER&nbsp;NAME...." />

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

            <label for="TEACHER_ID">TEACHER ID</label>
            <input type="text" id="TEACHER_ID" name="TEACHER_ID" placeholder="TEACHER ID.....">

            <label for="TEACHER_USER_NAME">USER NAME</label>
            <input type="text" id="user_name" name="USER_NAME" placeholder="USER NAME.....">

            <label for="TEACHER_PASSWORD">PASSWORD</label>
            <div style="display: flex; position: relative;">
                <input type="password" id="myInput" name="PASSWORD" placeholder="PASSWORD.....">
                <img style="position: absolute; width: 30px; right: 20px; top: 15px;" id="eyeicn"
                    src="https://prints.ultracoloringpages.com/3432e88e75ac97b18fa7788bf0dfec83.png"
                    onclick="myFunction()">

                <script>
                    function myFunction() {
                        var x = document.getElementById("myInput");
                        if (x.type === "password") {
                            x.type = "text";
                            eyeicn.src = "https://cdn1.iconfinder.com/data/icons/general-icons2/128/eye-open-1024.png";
                        } else {
                            x.type = "password";
                            eyeicn.src = "https://prints.ultracoloringpages.com/3432e88e75ac97b18fa7788bf0dfec83.png";
                        }
                    }
                </script>
            </div>
            <label for="TEACHER_PASSWORD">IMAGE</label>
            <input type="file" name="img" accept=".jpg, .jpeg, .png">

            <button class="btn" type="SUBMIT" name="SUBMIT">SUBMIT</button>

        </form>
    </div>
    <?php
    if (isset($_POST['SUBMIT'])) {
        include 'view.php';
        $TEACHER_NAME = $_POST['TEACHER_NAME'];
        $USER_NAME = $_POST['USER_NAME'];
        $PASSWORD = $_POST['PASSWORD'];
        $DES = $_SESSION['designation'];
        $PROGRAM = $_POST['PROGRAM'];
        $TEACHER_ID = $_POST['TEACHER_ID'];


        $fname = $_FILES['img']['name'];
        $tname = $_FILES['img']['tmp_name'];
        $folder = "upload/" . $fname;

        move_uploaded_file($tname, $folder);

        $sql = "INSERT INTO `user`(`user_name`, `password`, `name`, `designation`) VALUES (?, ?, ?, ?);";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$USER_NAME, $PASSWORD, $TEACHER_NAME, $DES]);

        $sql1 = "INSERT INTO `teacher`(`PROGRAM`, `TEACHER_NAME`, `TEACHER_ID`,`TEACHER_IMG`) VALUES (?, ?, ?,?);";
        $stmtinsert = $db->prepare($sql1);
        $result1 = $stmtinsert->execute([$PROGRAM, $TEACHER_NAME, $TEACHER_ID, $folder]);

        echo "$TEACHER_NAME , $USER_NAME , $PASSWORD , $DES <br>";
        echo "$PROGRAM , $TEACHER_ID , $TEACHER_NAME ,$folder";

    }

    ?>
</body>

</html>