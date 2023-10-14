<?php
$title = "home";
$page = "home";
include_once("nav.html")
    ?>

<?php
include "daba.php";
if (isset($_GET['PCODE'])) {
    $PCODE = $_GET['PCODE'];
    $delete = mysqli_query($cone, "DELETE FROM teacher WHERE `TEACHER_ID`='$PCODE'");

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
    <div style="display: flex;justify-content: center;">
        <form action="teacherview.php" method="post">
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
                <div>
                    <input type="SUBMIT" name="SUBMIT" class="btn">
                </div>
            </div>


        </form>
    </div>
    <div style="display: flex;justify-content: center;">
        <table>
            <?php
            include "daba.php";
            if (isset($_POST['SUBMIT'])) {
                $PROGRAM = $_POST['PROGRAM'];

                $select = "select * from teacher where PROGRAM = '$PROGRAM'";

                /*$select = "select * from view1, teacher where view1.PCODE=teacher.PCODE ='$PCODE' and view1.PROGRAM=teacher.PROGRAM";*/

                $query = mysqli_query($cone, $select);

                $num = mysqli_num_rows($query);

                if ($num > 0) {
                    echo "<tr>
        <th>PROGRAM</th>
        <th>TEACHER NAME</th>
        <th>TEACHER ID</th>
        <th>TEACHER IMAGE</th>
        <th>DELETE</th>
    </tr>";
                    while ($result = mysqli_fetch_assoc($query))
                        echo "<tr>
                <td>" . $result['PROGRAM'] . "</td>
                <td>" . $result['TEACHER_NAME'] . "</td>
                <td>" . $result['TEACHER_ID'] . "</td>
                <td>
                    <img src='" . $result['TEACHER_IMG'] . "' height='100px' width='100'>
                </td>
                <td>
                <a href='teacherview.php? PCODE=" . $result['TEACHER_ID'] . "'>Delete</a>
                </td>
            </tr>";
                }
            } else {
                $select = "select * from teacher ";
                $query = mysqli_query($cone, $select);

                $num = mysqli_num_rows($query);

                if ($num > 0) {
                    echo "<tr>
            <th>PROGRAM</th>
            <th>TEACHER NAME</th>
            <th>TEACHER ID</th>
            <th>TEACHER IMAGE</th>
            <th>DELETE</th>
        </tr>";
                    while ($result = mysqli_fetch_assoc($query))
                        echo "<tr>
                   
                    <td>" . $result['PROGRAM'] . "</td>
                   <td>" . $result['TEACHER_NAME'] . "</td>
                    <td>" . $result['TEACHER_ID'] . "</td>
                    <td>
                        <img src='" . $result['TEACHER_IMG'] . "' height='100px' width='100'>
                    </td>
                    <td>
                    <a href='teacherview.php? PCODE=" . $result['TEACHER_ID'] . "'>Delete</a>
                    </td>
                </tr>";
                }
            }
            ?>
        </table>
    </div>
    <a href="#" class="btn" onclick="window.print();return false;">Print</a>
</body>

</html>