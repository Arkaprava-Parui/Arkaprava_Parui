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
    <link rel="stylesheet" type="text/css" href="allsubject.css">
    <title>Document</title>
</head>
<body>
    <?php
    include"daba.php";
    if (isset($_GET['TNAME'])) {
        $tname = $_GET['TNAME'];

        $SELECT = "SELECT avg(Q1),avg(Q2),avg(Q3),avg(Q4),avg(Q5),avg(Q6),avg(Q7),avg(Q8),avg(Q9),avg(Q10) FROM `feedback` where TEACHER_NAME = '$tname' and (TYPE = 'ELECTIVE' or TYPE = 'CORE')";
        $QUERY = mysqli_query($cone, $SELECT);
        $nu = mysqli_num_rows($QUERY);

        $SELECT2 = "SELECT DISTINCT `SUBJECT`,`PCODE` FROM `feedback` where TEACHER_NAME = '$tname' and (TYPE = 'ELECTIVE' or TYPE = 'CORE')";
        $QUERY2 = mysqli_query($cone, $SELECT2);
        $nu2 = mysqli_num_rows($QUERY2);
        ?>
        <div style="padding: 10px;">
        <?php
        while ($res = mysqli_fetch_array($QUERY2)) {
            echo $res['SUBJECT'], "   (",$res['PCODE'],") , ";
        }
        ?>
        </div>
        <div class="table">
        <table>
        <?php
        while ($result= mysqli_fetch_array($QUERY)) {
            $aq1 = round($result['avg(Q1)']*20,2);
            $aq2 = round($result['avg(Q2)']*20,2);
            $aq3 = round($result['avg(Q3)']*20,2);
            $aq4 = round($result['avg(Q4)']*20,2);
            $aq5 = round($result['avg(Q5)']*20,2);
            $aq6 = round($result['avg(Q6)']*20,2);
            $aq7 = round($result['avg(Q7)']*20,2);
            $aq8 = round($result['avg(Q8)']*20,2);
            $aq9 = round($result['avg(Q9)']*20,2);
            $aq10 = round($result['avg(Q10)']*20,2);

            echo "<tr>
            <th>Q1</th>
            <th>Q2</th>
            <th>Q3</th>
            <th>Q4</th>
            <th>Q5</th>
            <th>Q6</th>
            <th>Q7</th>
            <th>Q8</th>
            <th>Q9</th>
            <th>Q10</th>
            </tr>";
            echo "<tr>
            <td>" . $aq1 . "</td>
            <td>" . $aq2 ."</td>
            <td>" . $aq3 ."</td>
            <td>" . $aq4 . "</td>
            <td>" . $aq5 ."</td>
            <td>" . $aq6 ."</td>
            <td>" . $aq7 . "</td>
            <td>" . $aq8 ."</td>
            <td>" . $aq9 ."</td>
            <td>" . $aq10 ."</td>
            </tr>";
        }?>

        </table>
        </div>

        <?php
        $SELECT1 = "SELECT avg(Q1),avg(Q2),avg(Q3),avg(Q4),avg(Q5) FROM `feedback` where TEACHER_NAME = '$tname' and (TYPE = 'LAB ELECTIVE' or TYPE = 'LAB CORE' or TYPE = 'SESSIONAL')";
        $QUERY1 = mysqli_query($cone, $SELECT1);
        $nu1 = mysqli_num_rows($QUERY1);

        $SELECT3 = "SELECT DISTINCT `SUBJECT`,`PCODE` FROM `feedback` where TEACHER_NAME = '$tname' and (TYPE = 'LAB ELECTIVE' or TYPE = 'LAB CORE' or TYPE = 'SESSIONAL')";
        $QUERY3 = mysqli_query($cone, $SELECT3);
        $nu3 = mysqli_num_rows($QUERY3);
        ?>
        <div style="padding: 10px;">
        <?php
        while ($res = mysqli_fetch_array($QUERY3)) {
            echo $res['SUBJECT'], "   (",$res['PCODE'],") , ";
        }
        ?>
        </div>
        <div class="table">
        <table>
        <?php
        
        while ($result1= mysqli_fetch_array($QUERY1)) {
            $aq1 = round($result1['avg(Q1)']*20,2);
            $aq2 = round($result1['avg(Q2)']*20,2);
            $aq3 = round($result1['avg(Q3)']*20,2);
            $aq4 = round($result1['avg(Q4)']*20,2);
            $aq5 = round($result1['avg(Q5)']*20,2);

            echo "<tr>
            <th>Q1</th>
            <th>Q2</th>
            <th>Q3</th>
            <th>Q4</th>
            <th>Q5</th>
            </tr>";


            echo "<tr>
            <td>" . $aq1 . "</td>
            <td>" . $aq2 ."</td>
            <td>" . $aq3 ."</td>
            <td>" . $aq4 . "</td>
            <td>" . $aq5 ."</td>
            </tr>";
        }
        
    }
    ?>
    </table>
    
</div>
<a href="#" class="btn" onclick="window.print();return false;">Print</a>
</body>
</html>