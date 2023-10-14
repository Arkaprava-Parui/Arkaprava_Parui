<?php
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
<?php
include 'daba.php';
$select="SELECT * FROM `student`";
$query = mysqli_query($cone , $select);
$num = mysqli_num_rows($query);

$select1="SELECT DISTINCT `STUDENT_NAME` FROM feedback";
$query1 = mysqli_query($cone , $select1);
$num1 = mysqli_num_rows($query1);

?>
<body>

    <div class="widgets">
        <div class="widget">
          <h2>Students</h2>
          <p class="count"><?= $num?></p>
          <p class="description">Total Students</p>
        </div>
        <div class="widget">
          <h2>Completed</h2>
          <p class="count"><?= $num1?></p>
          <p class="description">Total Submitted</p>
        </div>
        <div class="widget">
          <h2>Pending</h2>
          <p class="count"><?= $num-$num1?></p>
          <p class="description">Total Pending</p>
        </div>
      </div>
      <center>
      <table>
      <?php
      $se = "SELECT * FROM `teacher`";
      $query2 = mysqli_query($cone , $se);
      $n = mysqli_num_rows($query2);
      if($n>=0){
        echo "<tr>
        <th>TEACHER NAME</th>
        <th>PROGRAM</th>
        <th>TEACHER ID</th>
        <th>SCORE</th>
        </tr>";
        while($result = mysqli_fetch_array($query2)){
          echo "<tr>
            <td>" . $result['TEACHER_NAME'] . "</td>
            <td>" . $result['PROGRAM'] . "</td>
            <td>" . $result['TEACHER_ID'] . "</td>
            <td>
            <a href='score.php? TNAME=" . $result['TEACHER_NAME'] . "& PROGRAM=" . $result['PROGRAM'] . "& ID=" . $result['TEACHER_ID'] . "'>View</a>
            </td>
          </tr>";
        }
      }
      ?>
      </table>
      </center>
</body>

</html>