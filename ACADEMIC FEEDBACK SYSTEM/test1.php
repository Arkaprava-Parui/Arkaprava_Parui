<?php
$title = "home";
$page = "home";
include_once("nav.html")
    ?>
<?php
session_start();
if (isset($_SESSION['PROGRAM'])) {
    include 'view.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="test1.css">

        <title>Document</title>
    </head>

    <body>
        <h2>
            <?= $_SESSION['PROGRAM'] ?>
        </h2>

        <?php
        include "daba.php";
        $PROGRAM = $_SESSION['PROGRAM'];
        $select = "SELECT * FROM teacher";
        $query = mysqli_query($cone, $select);
        $num = mysqli_num_rows($query); ?>
        <div style="display: flex;justify-content: center;">
            <form action="test1.php" method="post">

                <?php if ($num > 0) { ?>
                    <div>
                        <label for="TEACHER_NAME">TEACHER NAME</label>
                        <select name="TEACHER_NAME" id="TEACHER_NAME">
                            <?php while ($result = mysqli_fetch_array($query)) {
                                ?>
                                <option name="TEACHER_NAME" value="<?= $result['TEACHER_NAME']; ?>"><?php echo $result['TEACHER_NAME']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                <?php }

                $select1 = "SELECT * FROM view1 where PROGRAM ='$PROGRAM'";
                $query1 = mysqli_query($cone, $select1);
                $num1 = mysqli_num_rows($query1);
                if ($num1 > 0) { ?>
                    <div>
                        <label for="SUBJECT">SUBJECT</label>
                        <select name="SUBJECT" id="SUBJECT">
                            <?php while ($result1 = mysqli_fetch_array($query1)) {
                                ?>
                                <option name="SUBJECT" value="<?= $result1['SUBJECT']; ?>"><?php echo $result1['SUBJECT']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                <?php } ?>
                <input class="btn" type="submit" name="submit1" value="submit">
            </form>
        </div>
        <?php
        if (isset($_POST['submit1'])) {
            
            $_SESSION['SUBJECT'] = $SUBJECT = $_POST['SUBJECT'];
            $_SESSION['TNAME'] = $TEACHER_NAME = $_POST['TEACHER_NAME'];
            $PROGRAM = $_SESSION['PROGRAM'];
            $sel = "SELECT * FROM view1 where SUBJECT = '$SUBJECT'";
            $que = mysqli_query($cone, $sel);
            $res = mysqli_fetch_array($que);
            $sel1 = "SELECT * FROM teacher where TEACHER_NAME = '$TEACHER_NAME'";
            $que1 = mysqli_query($cone, $sel1);
            $res1 = mysqli_fetch_array($que1);
            $_SESSION['TID'] = $TEACHER_ID = $res1['TEACHER_ID'];
            $_SESSION['TYPE'] = $TYPE = $res['TYPE'];
            $_SESSION['PCODE'] = $PCODE = $res['PCODE'];
            $_SESSION['SEMESTER'] = $SEMESTER = $res['SEMESTER'];
            $_SESSION['IMG'] = $IMG = $res1['TEACHER_IMG'];

            if ($TYPE === 'LAB CORE') {
                ?>
                <form action="test1.php" method="POST">
                    <div>

                    </div>
                    <div>
                        <label for="GROUP">Select the group</label><br>
                        <label><input type="radio" name="radio" value="A" /> A</label><br>
                        <label><input type="radio" name="radio" value="B" /> B</label>
                    </div>
                    <input type="submit" class="btn" value="ADD" name="add">
                </form>
                <?php



            } else {
                $_SESSION['SUBJECT'] = $SUBJECT = $_POST['SUBJECT'];
                $_SESSION['TNAME'] = $TEACHER_NAME = $_POST['TEACHER_NAME'];
                $PROGRAM = $_SESSION['PROGRAM'];
                $sel = "SELECT * FROM view1 where SUBJECT = '$SUBJECT'";
                $que = mysqli_query($cone, $sel);
                $res = mysqli_fetch_array($que);
                $sel1 = "SELECT * FROM teacher where TEACHER_NAME = '$TEACHER_NAME'";
                $que1 = mysqli_query($cone, $sel1);
                $res1 = mysqli_fetch_array($que1);
                $_SESSION['TID'] = $TEACHER_ID = $res1['TEACHER_ID'];
                $_SESSION['TYPE'] = $TYPE = $res['TYPE'];
                $_SESSION['PCODE'] = $PCODE = $res['PCODE'];
                $_SESSION['SEMESTER'] = $SEMESTER = $res['SEMESTER'];
                $_SESSION['IMG'] = $IMG = $res1['TEACHER_IMG'];

                $sql = "INSERT INTO `teacher_subject` (PROGRAM,SEMESTER,SUBJECT,TEACHER_NAME,PCODE,TEACHER_ID,TEACHER_IMG,TYPE) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
                $stmtinsert = $db->prepare($sql);
                $result = $stmtinsert->execute([$PROGRAM, $SEMESTER, $SUBJECT, $TEACHER_NAME, $PCODE, $TEACHER_ID,$IMG , $TYPE]);
                ?>
                <div style="display: flex; justify-content: center;">
                    <table>
                        <tr>
                            <th>PROGRAM</th>
                            <th>SEMESTER</th>
                            <th>SUBJECT</th>
                            <th>TEACHER NAME</th>
                            <th>PAPER CODE</th>
                            <th>TEACHER ID</th>
                            <th>SUBJECT TYPE</th>
                            <th>IMAGE</th>
                        </tr>
                        <tr>
                            <td>
                                <?= $PROGRAM ?>
                            </td>
                            <td>
                                <?= $SEMESTER ?>
                            </td>
                            <td>
                                <?= $SUBJECT ?>
                            </td>
                            <td>
                                <?= $TEACHER_NAME ?>
                            </td>
                            <td>
                                <?= $PCODE ?>
                            </td>
                            <td>
                                <?= $TEACHER_ID ?>
                            </td>
                            <td>
                                <?= $TYPE ?>
                            </td>
                            <td>
                                <img src="<?= $IMG?>" width="100px" height="100px" >
                            </td>
                        </tr>
                    </table>
                </div>
                <?php
            }

        }
        if (isset($_POST['add'])) {

                $sql5 = "INSERT INTO `teacher_subject` (PROGRAM,SEMESTER,SUBJECT,TEACHER_NAME,PCODE,TEACHER_ID,TYPE,TEACHER_IMG,`GROUP`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
                $stmtinsert = $db->prepare($sql5);
                $result = $stmtinsert->execute([$_SESSION['PROGRAM'], $_SESSION['SEMESTER'], $_SESSION['SUBJECT'], $_SESSION['TNAME'], $_SESSION['PCODE'], $_SESSION['TID'], $_SESSION['TYPE'],$_SESSION['IMG'],$_POST['radio']]);
            ?>

            <table>
                <tr>
                    <th>PROGRAM</th>
                    <th>SEMESTER</th>
                    <th>SUBJECT</th>
                    <th>TEACHER NAME</th>
                    <th>PAPER CODE</th>
                    <th>TEACHER ID</th>
                    <th>SUBJECT TYPE</th>
                    <th>GROUP</th>
                    <th>IMAGE</th>
                </tr>
                <tr>
                    <td>
                        <?= $_SESSION['PROGRAM'] ?>
                    </td>
                    <td>
                        <?= $_SESSION['SEMESTER'] ?>
                    </td>
                    <td>
                        <?= $_SESSION['SUBJECT'] ?>
                    </td>
                    <td>
                        <?= $_SESSION['TNAME'] ?>
                    </td>
                    <td>
                        <?= $_SESSION['PCODE'] ?>
                    </td>
                    <td>
                        <?= $_SESSION['TID'] ?>
                    </td>
                    <td>
                        <?= $_SESSION['TYPE'] ?>
                    </td>
                    <td>
                        <?= $_POST['radio'] ?>
                    </td>
                    <td>
                    <img src="<?= $_SESSION['IMG']?>" width="100px" height="100px" >
                    </td>
                </tr>
            </table>
            <?php
        }

}
?>
</body>

</html>