<?php
$title = "home";
$page = "home";
include_once("nav.html")
    ?>
<?php
include "daba.php";
if (isset($_GET['PCODE'])) {
    $PCODE = $_GET['PCODE'];
    $delete = mysqli_query($cone, "DELETE FROM view1 WHERE `PCODE`='$PCODE'");


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
        <form action="viewdata.php" method="post">
            <label for="gender">SEMESTER</label>
            <select id="SEMESTER" name="SEMESTER">
                <option name="SEMESTER" value="">Please Select</option>
                <option name="SEMESTER" value="1st">1st</option>
                <option name="SEMESTER" value="2nd">2nd</option>
                <option name="SEMESTER" value="3rd">3rd</option>
                <option name="SEMESTER" value="4th">4th</option>
                <option name="SEMESTER" value="5th">5th</option>
                <option name="SEMESTER" value="6th">6th</option>
                <option name="SEMESTER" value="7th">7th</option>
                <option name="SEMESTER" value="8th">8th</option>
            </select>
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
            <div>
                <input type="SUBMIT" name="SUBMIT" class="btn">
            </div>
        </form>
    </div>
    <div style="display: flex;justify-content: center;">
        <table>
            <?php
            include "daba.php";
            if (isset($_POST['SUBMIT'])) {
                $SEMESTER = $_POST['SEMESTER'];
                $PROGRAM = $_POST['PROGRAM'];
                $select = "select * from view1 where SEMESTER='$SEMESTER' and PROGRAM='$PROGRAM' ";
                $query = mysqli_query($cone, $select);

                $num = mysqli_num_rows($query);

                if ($num > 0) {
                    echo "<tr>
                            <th>SEMESTER</th>
                            <th>PROGRAM</th>
                            <th>SUBJECT</th>
                            <th>PCODE</th>
                            <th>DELETE</th>
                        </tr>";
                    while ($result = mysqli_fetch_assoc($query))
                        echo "<tr>
                                <td>" . $result['SEMESTER'] . "</td>
                                <td>" . $result['PROGRAM'] . "</td>
                                <td>" . $result['SUBJECT'] . "</td>
                                <td>" . $result['PCODE'] . "</td>
                                <td>
                                <a href='viewdata.php? PCODE=" . $result['PCODE'] . "'>Delete</a>
                                </td>
                            </tr>";
                }
            } else {
                $select = "select * from view1";
                $query = mysqli_query($cone, $select);

                $num = mysqli_num_rows($query);

                if ($num > 0) {
                    echo "<tr>
                            <th>SEMESTER</th>
                            <th>PROGRAM</th>
                            <th>SUBJECT</th>
                            <th>PCODE</th>
                            <th>DELETE</th>
                        </tr>";
                    while ($result = mysqli_fetch_assoc($query))
                        echo "<tr>
                                <td>" . $result['SEMESTER'] . "</td>
                                <td>" . $result['PROGRAM'] . "</td>
                                <td>" . $result['SUBJECT'] . "</td>
                                <td>" . $result['PCODE'] . "</td>
                                <td>
                                <a href='viewdata.php? PCODE=" . $result['PCODE'] . "'>Delete</a>
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