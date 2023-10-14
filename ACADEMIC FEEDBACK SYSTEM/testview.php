<?php
$title = "home";
$page = "home";
include_once("nav.html");
session_start()
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
    <div style="display: flex;justify-content: center; padding: 15px">
        <table>
            <?php
            include "daba.php";
            if (isset($_SESSION['PROGRAM'])) {
                $PROGRAM = $_SESSION['PROGRAM'];
                $select = "select * from teacher_subject where PROGRAM = '$PROGRAM'";
                $query = mysqli_query($cone, $select);
                $num = mysqli_num_rows($query);
                if ($num > 0) {
                    echo "<tr>
            <th>PROGRAM</th>
            <th>SEMESTER</th>
            <th>SUBJECT</th>
            <th>PCODE</th>
            <th>TEACHER NAME</th>
            <th>TEACHER ID</th>
            <th>TYPE</th>
            <th>TEACHER IMAGE</th>
            <th>DELETE</th>
        </tr>";
                    while ($result = mysqli_fetch_assoc($query))
                        echo "<tr>
                    <td>" . $result['PROGRAM'] . "</td>
                    <td>" . $result['SEMESTER'] . "</td>
                    <td>" . $result['SUBJECT'] . "</td>
                    <td>" . $result['PCODE'] . "</td>
                    <td>" . $result['TEACHER_NAME'] . "</td>
                    <td>" . $result['TEACHER_ID'] . "</td>
                    <td>" . $result['TYPE'] . "</td>
                    <td>
                        <img src='" . $result['TEACHER_IMG'] . "' height='100px' width='100'>
                    </td>
                    <td>
                    <a href='testview.php? PCODE=" . $result['PCODE'] . "& TEACHER_ID=" . $result['TEACHER_ID'] . "'>Delete</a>
                    </td>
                </tr>";
                }

                if (isset($_GET['PCODE']) && isset($_GET['TEACHER_ID'])) {
                    $PCODE = $_GET['PCODE'];
                    $id = $_GET['TEACHER_ID'];
                    $delete = "delete from teacher_subject where PCODE='$PCODE' AND TEACHER_ID='$id'";
                    $que = mysqli_query($cone, $delete);
                }
            }
            ?>
        </table>
    </div>
    <a href="#" class="bts" onclick="window.print();return false;">Print</a>
</body>

</html>