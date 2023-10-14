<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
     function validate($data){
          $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="ar.css">
          <a href="logout.php">Logout</a>
          <a href="studentview.php" class="view">View</a>          
          <h1>Hello, <?php echo $_SESSION['name']; ?></h1>

</head>
<body>
     
     <center>
          
          <table>
          <?php 
               include 'daba.php';
               $select = 'select * FROM teacher_subject WHERE TEACHER_NAME = "'. $_SESSION['name']. '"';
               $query = mysqli_query($cone,$select);
               $num = mysqli_num_rows($query);
                    
               if ($num>0) {
                    echo "<tr>
                    <th>PAPER CODE</th>
                    <th>SUBJECT</th>
                    <th>SUBJECT TYPE</th>
                    <th>ADD</th>
                    </tr>";
                    while ($result = mysqli_fetch_array($query)) {
                         if ($result['TYPE']=='ELECTIVE'||$result['TYPE']=='LAB ELECTIVE') {
                              echo "<tr>
                              <td>".$result['PCODE']."</td>
                              <td>".$result['SUBJECT']."</td>
                              <td>".$result['TYPE']."</td>
                              <td>
                              <a href='teacheruser.php? SEMESTER=" . $result['SEMESTER'] . " & PROGRAM=" . $result['PROGRAM'] . "&PCODE=" . $result['PCODE'] . "& SUBJECT=" . $result['SUBJECT'] . "& TYPE=". $result['TYPE']."'>Select</a>
                              </td>
                              </tr>";
                         }else {
                              echo "<tr>
                              <td>".$result['PCODE']."</td>
                              <td>".$result['SUBJECT']."</td>
                              <td>".$result['TYPE']."</td>
                              <td>".$result['SEMESTER']."</td>
                              </tr>";
                         }
                              
                         
                    } 
               }
          ?>
     </table>
     
     <table>
          <form action="teacheruser.php" method="post">
          <?php 
          if(isset($_SESSION['PCODE']) && isset($_SESSION['SUBJECT'])){
               $pcode =validate($_SESSION['PCODE']) ;
               $subject =validate($_SESSION['SUBJECT']) ;
               $elective = "SELECT * FROM `view1` WHERE `PCODE`='$pcode' AND `SUBJECT`='$subject'";
               $MAR = mysqli_query($cone, $elective);
               $n = mysqli_num_rows($MAR);
               if($n>0){
                    $row = mysqli_fetch_array($MAR);
                    if($row['TYPE']==='ELECTIVE'|| $row['TYPE']==='LAB ELECTIVE'){?>
                         <h4 style="display: flex;justify-content: center;"><?php echo $subject . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $pcode ?></h4>
                    <?php
                    $SEMESTER = $row['SEMESTER'];
                    $PROGRAM = $row['PROGRAM'];
                    /*echo $SEMESTER, $PROGRAM;*/
                    $search = "SELECT * FROM student WHERE SEMESTER = '$SEMESTER' and PROGRAM = '$PROGRAM'";
                    $student = mysqli_query($cone, $search);
                    $stu = mysqli_num_rows($student);
                    if ($stu > 0){?>
                         <tr>
                              
                              <th>STUDENT_NAME</th>
                              <th>STUDENT_ROLL</th>
                              <th></th>
                         </tr>
                              <?php /*while ($hmm = mysqli_fetch_array($student)) */
                              foreach($student as $hmm)
                              {?>
                                   <tr>
                                   
                                   <td><?=$hmm['STUDENT_NAME']?></td>
                                   <td><?=$hmm['STUDENT_ROLL']?></td>
                                   <td>
                                        <input type="checkbox" name="student[]" value="<?= $hmm['STUDENT_ROLL'];?>">
                                   </td>
                                   </tr>
                                   
                             <?php }
                    }
                    ?>
                    <tr>
                    <td></td>
                    <td><button type="submit" name="studentadd" >SELECT</button></td></td>
                    <td>
                    </tr>
                    <?php 
                    }
                    
               }
          }
                    ?>
                    
                    <?php
              
               if (isset($_GET['PROGRAM']) && isset($_GET['SEMESTER'])) {
                    include 'daba.php';
                    $_SESSION['PCODE'] = $_GET['PCODE'];
                    $_SESSION['SUBJECT'] = $_GET['SUBJECT'];
                    $_SESSION['TYPE'] = $_GET['TYPE'];
                    
               }      
          ?>
          </form>
     </table>
     
     <?php
if (isset($_SESSION['PCODE']) && isset($_SESSION['SUBJECT'])){
     if(isset($_POST['studentadd'])){
          
               include "view.php";
               $NAME = $_POST['student'];
               $ROLL = implode(',',$NAME);
               $sub=$_SESSION['SUBJECT'];
               $TYPE=$_SESSION['TYPE'];
               $arr = sizeof($NAME);
               for($i = 0 ; $i < sizeof($NAME) ;$i++){
                    $sel = "SELECT * FROM student WHERE STUDENT_ROLL = '$NAME[$i]'";
                    $res= mysqli_query($cone,$sel);
                    $cal= mysqli_fetch_array($res);
                         $insert = "INSERT INTO `elective_subject` ( STUDENT_NAME,`STUDENT_ROLL`, `SUBJECT`, `PCODE`,TYPE) VALUES (?, ?, ?, ?, ?)";
                         $stmtinsert = $db->prepare($insert);
                         $result = $stmtinsert->execute([$cal['STUDENT_NAME'], $NAME[$i], $sub, $_SESSION['PCODE'],$TYPE]);
                    echo  "$cal[STUDENT_NAME],$NAME[$i] ,$_SESSION[SUBJECT],$_SESSION[PCODE],$i, $TYPE <br>";
               }
               }
}
?>
</center>
</body>
</html>

<?php 
}else{
     header("Location: teacheruser.php");
     exit();
}
 ?>