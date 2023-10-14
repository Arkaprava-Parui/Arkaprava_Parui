<?php
session_start();
if (isset($_SESSION['id']) && $_SESSION['user_name']) {
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
     <a href="logout.php">Logout</a>

     <body>
          <h1>Hello,
               <?php echo $_SESSION['name']; ?>
          </h1>
          <Center>
               <table>
                    <?php
                    include 'daba.php';
                    $select = 'select * FROM teacher_subject WHERE TEACHER_NAME = "' . $_SESSION['name'] . '"';
                    $query = mysqli_query($cone, $select);
                    $num = mysqli_num_rows($query);

                    if ($num > 0) {
                         echo "<tr>
                    <th>PAPER CODE</th>
                    <th>SUBJECT</th>
                    <th>SUBJECT TYPE</th>
                    <th>ADD</th>
                    </tr>";
                         while ($result = mysqli_fetch_array($query)) {
                              if ($result['TYPE'] === 'ELECTIVE' || $result['TYPE'] === 'LAB ELECTIVE' || $result['TYPE'] === 'PROJECT') {
                                   echo "<tr>
                              <td>" . $result['PCODE'] . "</td>
                              <td>" . $result['SUBJECT'] . "</td>
                              <td>" . $result['TYPE'] . "</td>
                              <td>
                              <a href='studentview.php? PCODE=" . $result['PCODE'] . "& SUBJECT=" . $result['SUBJECT'] . "'>Submit</a>
                              </td>
                              </tr>";
                              }

                         }
                    }


                    ?>
               </table>
          </Center>
          <Center>
               <table>
                    <form action="studentview.php" method="post">
                         <?php
                         include 'daba.php';
                         if (isset($_GET['PCODE']) && $_GET['SUBJECT']) {
                              $SUBJECT = $_GET['SUBJECT'];
                              $PCODE = $_GET['PCODE'];
                              $sel = "SELECT * FROM elective_subject WHERE SUBJECT='$SUBJECT' AND PCODE='$PCODE'";
                              $que = mysqli_query($cone, $sel);
                              if (mysqli_num_rows($que) > 0) { ?>
                                   <tr>
                                        <th>STUDENT_NAME</th>
                                        <th>STUDENT_ROLL</th>
                                        <th>SUBJECT</th>
                                        <th>
                                             <button type="submit" name="Delete">DELETE</button>
                                        </th>
                                   </tr>
                                   <?php
                                   while ($res = mysqli_fetch_array($que)) { ?>

                                        <tr>
                                             <td>
                                                  <?= $res['STUDENT_NAME'] ?>
                                             </td>
                                             <td>
                                                  <?= $res['STUDENT_ROLL'] ?>
                                             </td>
                                             <td>
                                                  <?= $res['SUBJECT'] ?>
                                             </td>
                                             <td>
                                                  <input type="checkbox" name="ROLL[]" value="<?= $res['STUDENT_ROLL']; ?>">
                                             </td>
                                        </tr>

                                        <?php
                                   }
                              }
                              echo $_GET['PCODE'], "     ", $_GET['SUBJECT'];
                         }
                         ?>
                    </form>
               </table>
          </Center>
     </body>

     </html>
     <?php
     if (isset($_POST['Delete'])) {

          include "view.php";
          $roll = $_POST['ROLL'];
          $ROLL = implode(',', $roll);
          $sub = $_SESSION['SUBJECT'];
          $arr = sizeof($roll);
          for ($i = 0; $i < sizeof($roll); $i++) {
               $delete = "delete from elective_subject where STUDENT_ROLL = '$roll[$i]'";
               $res = mysqli_query($cone, $delete);
               echo "you have rfsfc $roll[$i] <br>";
          }

     }
?>
<?php
}
?>