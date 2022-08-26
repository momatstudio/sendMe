<?php 
  session_start(); 
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header('location: user.php?redirect=all tasks');
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>sendMe | All Tasks</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/header.css">
	<!-- <link rel="stylesheet" type="text/css" href="styles/cover.css"> -->
	<link rel="stylesheet" type="text/css" href="styles/tasks.css">
	<link rel="stylesheet" type="text/css" href="styles/taskers.css">
	<link rel="stylesheet" type="text/css" href="styles/taskers list.css">
</head>
<body>
<?php include 'backend/connection.php'?>
<?php include 'inc/global/header.php'?>
<?php include 'inc/taskers/search.php'?>
<?php include 'inc/taskers/taskers.php'?>
<?php ?>
</body>
</html>