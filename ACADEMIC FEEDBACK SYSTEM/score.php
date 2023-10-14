<?php
error_reporting(0);
$title = "home";
$page = "home";
include_once("nav.html")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="adminstart.css">
    <title>Document</title>
</head>
<body>
    <center>
    <table>
    <?php
    include"daba.php";
    $TNAME = $_GET['TNAME'];
    $ID = $_GET['ID'];
    $SELECT = "SELECT * FROM `teacher_subject` WHERE TEACHER_NAME='$TNAME' AND TEACHER_ID='$ID'";
    $QUERY = mysqli_query($cone,$SELECT);
    $num = mysqli_num_rows($QUERY);
    if ($num > 0) {
        echo "<tr>
        <th>SUBJECT</th>
        <th>PAPER CODE</th>
        <th>SEMESTER</th>
        <th>PROGRAM</th>
        <th>SCORE</th>
        </tr>";
        while ($r=mysqli_fetch_array($QUERY)) {
            echo "<tr>
            <td>" . $r['SUBJECT'] . "</td>
            <td>" . $r['PCODE'] . "</td>
            <td>" . $r['SEMESTER'] . "</td>
            <td>" . $r['PROGRAM'] . "</td>
            <td>
            <a href='rediractscore.php? TNAME=" . $r['TEACHER_NAME'] . "& SUBJECT=" . $r['SUBJECT'] . "& PCODE=" . $r['PCODE'] . "& TYPE=" . $r['TYPE'] . "'>View</a>
            </td>
          </tr>";
        }
        echo "<tr>
            <td>TOTAL SCORE</td>
            <td></td>
            <td></td>
            <td></td>
            <td>
            <a href='allsubject.php? TNAME=" . $TNAME . "'>View</a>
            </td>
          </tr>";
    }

/*    if (isset($_GET['TNAME']) && isset($_GET['SUBJECT']) &&isset($_GET['PCODE']) &&isset($_GET['TYPE'])) {
        if ($_GET['TYPE']==='CORE'||$_GET['TYPE']==='ELECTIVE') {
            session_start();
            $_SESSION['TNAME'] = $_GET['TNAME'];
            $_SESSION['SUBJECT'] = $_GET['SUBJECT'];
            $_SESSION['PCODE'] = $_GET['PCODE'];
            $_SESSION['TYPE'] = $_GET['TYPE'];
            header("Location: scorechart.php");
        }
        else {
            session_start();
            $_SESSION['TNAME'] = $_GET['TNAME'];
            $_SESSION['SUBJECT'] = $_GET['SUBJECT'];
            $_SESSION['PCODE'] = $_GET['PCODE'];
            $_SESSION['TYPE'] = $_GET['TYPE'];
            header("Location: scorechart1.php");
        }
    }
*/
    ?>
    </table>
    </center>
</body>
</html>