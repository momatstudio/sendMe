<?php 
  session_start(); 
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: user.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>sendMe | Home</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/header.css">
	<link rel="stylesheet" type="text/css" href="styles/cover.css">
	<link rel="stylesheet" type="text/css" href="styles/tasks.css">
</head>
<body>
<!-- <div class="content">
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
-->
<?php include 'backend/connection.php'?>
<?php include 'inc/global/header.php'?>
<?php include 'inc/index/cover.php'?>
<?php include 'inc/index/tasks-section.php'?>
<script src="script.js"></script>
</body>
</html>