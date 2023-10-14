<?php
$title = "home";
$page = "home";
include_once("nav.html")
?>
<?php
session_start();
if (isset($_SESSION['TNAME']) && isset($_SESSION['SUBJECT']) && isset($_SESSION['PCODE']) && isset($_SESSION['TYPE'])){


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="adminstart.css">
    <title>Document</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        <?php
        include'daba.php';
        $ye = date("Y");
        $TNAME=$_SESSION['TNAME'];
        $SUBJECT=$_SESSION['SUBJECT'];
        $select = "SELECT avg(Q1),avg(Q2),avg(Q3),avg(Q4),avg(Q5),avg(Q6),avg(Q7),avg(Q8),avg(Q9),avg(Q10) FROM `feedback` WHERE `TEACHER_NAME`= '$TNAME' AND `SUBJECT` = '$SUBJECT' AND `YEAR`= '$ye'";
        $QU = mysqli_query($cone,$select);
        $nu = mysqli_num_rows($QU);
          if ($nu>0) {
            while ($r=mysqli_fetch_array($QU)) {
            
            $p1 =round($r['avg(Q1)']*20,2);
            $p2 =round($r['avg(Q2)']*20,2);
            $p3 =round($r['avg(Q3)']*20,2);
            $p4 =round($r['avg(Q4)']*20,2);
            $p5 =round($r['avg(Q5)']*20,2);
            $p6 =round($r['avg(Q6)']*20,2);
            $p7 =round($r['avg(Q7)']*20,2);
            $p8 =round($r['avg(Q8)']*20,2);
            $p9 =round($r['avg(Q9)']*20,2);
            $p10=round($r['avg(Q10)']*20,2);
          }
          }
        $ye1 = $ye-1;  
        $select1 = "SELECT avg(Q1),avg(Q2),avg(Q3),avg(Q4),avg(Q5),avg(Q6),avg(Q7),avg(Q8),avg(Q9),avg(Q10) FROM `feedback` WHERE `TEACHER_NAME`= '$TNAME' AND `SUBJECT` = '$SUBJECT' AND `YEAR`= '$ye1'";
        $QU1 = mysqli_query($cone,$select1);
        $nu1 = mysqli_num_rows($QU1);
        if ($nu1>0) {
          while ($r1 = mysqli_fetch_array($QU1)){
            $pp1	=	round($r1['avg(Q1)']*20,2);
            $pp2	=	round($r1['avg(Q2)']*20,2);
            $pp3	=	round($r1['avg(Q3)']*20,2);
            $pp4	=	round($r1['avg(Q4)']*20,2);
            $pp5	=	round($r1['avg(Q5)']*20,2);
            $pp6	=	round($r1['avg(Q6)']*20,2);
            $pp7	=	round($r1['avg(Q7)']*20,2);
            $pp8	=	round($r1['avg(Q8)']*20,2);
            $pp9	=	round($r1['avg(Q9)']*20,2);
            $pp10	=	round($r1['avg(Q10)']*20,2);
          }
        }
        
        
        $ye2 = --$ye1;  
        $select2 = "SELECT avg(Q1),avg(Q2),avg(Q3),avg(Q4),avg(Q5),avg(Q6),avg(Q7),avg(Q8),avg(Q9),avg(Q10) FROM `feedback` WHERE `TEACHER_NAME`= '$TNAME' AND `SUBJECT` = '$SUBJECT' AND `YEAR`= '$ye2'";
        $QU2 = mysqli_query($cone,$select2);
        $nu2 = mysqli_num_rows($QU2);
        if ($nu1>0) {
          while ($r2 = mysqli_fetch_array($QU2)){
            $pq1	=	round($r2['avg(Q1)']*20,2);
            $pq2	=	round($r2['avg(Q2)']*20,2);
            $pq3	=	round($r2['avg(Q3)']*20,2);
            $pq4	=	round($r2['avg(Q4)']*20,2);
            $pq5	=	round($r2['avg(Q5)']*20,2);
            $pq6	=	round($r2['avg(Q6)']*20,2);
            $pq7	=	round($r2['avg(Q7)']*20,2);
            $pq8	=	round($r2['avg(Q8)']*20,2);
            $pq9	=	round($r2['avg(Q9)']*20,2);
            $pq10	=	round($r2['avg(Q10)']*20,2);
          }
        }


        ?>
        var data = google.visualization.arrayToDataTable([
          ['QUESTIONS', '<?=$ye;?>' ,'<?= --$ye;?>' ,'<?= --$ye;?>'  ],
          ['Q1',  <?php echo $p1;?>  ,<?php echo $pp1;?>  ,<?php echo $pq1;?>  ],
          ['Q2',  <?php echo $p2;?>  ,<?php echo $pp2;?>  ,<?php echo $pq2;?>  ],
          ['Q3',  <?php echo $p3;?>  ,<?php echo $pp3;?>  ,<?php echo $pq3;?>  ],
          ['Q4',  <?php echo $p4;?>  ,<?php echo $pp4;?>  ,<?php echo $pq4;?>  ],
          ['Q5',  <?php echo $p5;?>  ,<?php echo $pp5;?>  ,<?php echo $pq5;?>  ],
          ['Q6',  <?php echo $p6;?>  ,<?php echo $pp6;?>  ,<?php echo $pq6;?>  ],
          ['Q7',  <?php echo $p7;?>  ,<?php echo $pp7;?>  ,<?php echo $pq7;?>  ],
          ['Q8',  <?php echo $p8;?>  ,<?php echo $pp8;?>  ,<?php echo $pq8;?>  ],
          ['Q9',  <?php echo $p9;?>  ,<?php echo $pp9;?>  ,<?php echo $pq9;?>  ],
          ['Q10',  <?php echo $p10;?> ,<?php echo $pp10;?>  ,<?php echo $pq10;?> ]
        ]);

        var options = {
          title: '<?=$TNAME .'\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0'. $_SESSION['PCODE']."($SUBJECT)".'\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0\u00A0'."RESPONSE = $nu"?>',
          legendTextStyle: { color: 'green' },
          legend: 'none',
          hAxis: { minValue: 0, maxValue: 9 },
          vAxis: { minValue: 0, maxValue: 100 },
          pointSize: 10,
          curveType: 'function',
          pointSize: 10,
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
    <table>
    <?php include"daba.php";?>
    

      <center>
        <div style="padding-top: 30px;">
          <div id="chart_div" style="width: 1000px; height: 550px; border-radius:15px"></div>
        </div>
      </center>
      <a href="#" class="btn" onclick="window.print();return false;">Print</a>
</body>
</html>
<?php }?>