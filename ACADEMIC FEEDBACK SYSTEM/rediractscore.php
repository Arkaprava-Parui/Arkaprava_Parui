<?php
if (isset($_GET['TNAME']) && isset($_GET['SUBJECT']) &&isset($_GET['PCODE']) &&isset($_GET['TYPE'])) {
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

?>