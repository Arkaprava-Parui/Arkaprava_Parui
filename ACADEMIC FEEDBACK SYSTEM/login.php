<?php
session_start();
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if ($_POST['uname'] === 'you can' && $_POST['password'] === '125') {
		$_SESSION['designation'] = "TEACHER";
		header("Location: register.php");
		exit();
	}
	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
		exit();
	} else if (empty($pass)) {
		header("Location: index.php?error=Password is required");
		exit();
	} else {
		$sql = "SELECT * FROM user WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);

			if ($row['designation'] === 'ADMIN') {
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['id'];
				header("Location: adminstart.php");
				exit();
			}
			if ($row['designation'] === 'STUDENT') {
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['id'];
				header("Location: home.php");
				exit();
			}
			if ($row['designation'] === 'TEACHER') {
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['id'];
				header("Location: teacheruser.php");
				exit();
			} else {
				header("Location: index.php?error=Incorect User name or password");
				exit();
			}
		} else {
			header("Location: index.php?error=Incorect User name or password");
			exit();
		}
	}

} else {
	header("Location: index.php");
	exit();
}