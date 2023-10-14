<?php
$title = "home";
$page = "home";
include_once("nav.html")
    ?>
<?php
error_reporting(0);
include 'view.php';
if (isset($_POST['SUBMIT'])) {
    $SEMESTER = $_POST['SEMESTER'];
    $PROGRAM = $_POST['PROGRAM'];
    $SUBJECT = $_POST['SUBJECT'];
    $PCODE = $_POST['PCODE'];
    $TYPE = $_POST['TYPE'];

    $sql = "INSERT INTO view1 (SEMESTER, PROGRAM, SUBJECT, PCODE,TYPE) VALUES (?,?,?,?,?);";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$SEMESTER, $PROGRAM, $SUBJECT, $PCODE, $TYPE]);

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
    <a href="viewdata.php" class="v">View</a>
    <div class="panel-body" style="display: flex;justify-content: center;">

        <form action="admin.php" method="post">
            <div>
                <label for="gender">SEMESTER</label>
                <select id="SEMESTER" name="SEMESTER" style="margin: 10px">
                    <option value="" name="SEMESTER">PLEASE SELECT</option>
                    <option value="1st" name="SEMESTER">1st</option>
                    <option value="2nd" name="SEMESTER">2nd</option>
                    <option value="3rd" name="SEMESTER">3rd</option>
                    <option value="4th" name="SEMESTER">4th</option>
                    <option value="5th" name="SEMESTER">5th</option>
                    <option value="6th" name="SEMESTER">6th</option>
                    <option value="7th" name="SEMESTER">7th</option>
                    <option value="8th" name="SEMESTER">8th</option>
                </select>
            </div>
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
                <label for="SUBJECT">SUBJECT</label>
                <input type="text" class="form-control" id="SUBJECT" name="SUBJECT" placeholder="SUBJECT...." />
            </div>
            <div class="form-group">
                <label for="PCODE">PAPER&nbsp;CODE</label>
                <input type="text" class="form-control" id="PCODE" name="PCODE" placeholder="PAPER&nbsp;CODE...." />
            </div>
            <div>
                <label for="TYPE">SUBJECT TYPE</label>
                <select id="TYPE" name="TYPE" style="margin: 10px">
                    <option value="" name="TYPE">PLEASE SELECT</option>
                    <option value="CORE" name="TYPE">CORE</option>
                    <option value="LAB CORE" name="TYPE">LAB CORE</option>
                    <option value="ELECTIVE" name="TYPE">ELECTIVE</option>
                    <option value="LAB ELECTIVE" name="TYPE">LAB ELECTIVE</option>
                    <option value="SESSIONAL" name="TYPE">SESSIONAL</option>
                    <option value="PROJECT" name="TYPE">PROJECT</option>
                </select>
            </div>
            <div>
                <input type="SUBMIT" name="SUBMIT" class="btn">
            </div>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['SUBMIT']))
    if ($result) { ?>
        <div style="display: flex;justify-content: center; padding-right: 70px;">
            <table>
                <tr>
                    <th>SEMESTER</th>
                    <th>PROGRAM</th>
                    <th>SUBJECT</th>
                    <th>PAPER CODE</th>
                    <th>SUBJECT TYPE</th>
                </tr>
                <tr>
                    <td>
                        <?= $SEMESTER ?>
                    </td>
                    <td>
                        <?= $PROGRAM ?>
                    </td>
                    <td>
                        <?= $SUBJECT ?>
                    </td>
                    <td>
                        <?= $PCODE ?>
                    </td>
                    <td>
                        <?= $TYPE ?>
                    </td>

                </tr>
            </table>
        </div>
        <?php

    }
?>