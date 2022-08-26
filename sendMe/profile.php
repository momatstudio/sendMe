<?php 
  session_start(); 
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: user.php?redirect=profile');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: user.php");
  }

  $section = isset($_GET['section']) ? $_GET['section'] : 'my profile';
  include 'backend/tasker-requirements.php';

  require_once 'backend/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>sendMe | My Profile</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/header.css">
    <link rel="stylesheet" type="text/css" href="styles/profile.css">
    <link rel="stylesheet" type="text/css" href="styles/tasker-history-details.css">
    <link rel="stylesheet" type="text/css" href="styles/my-profile.css">
</head>
<body>
    <?php include 'inc/global/header.php'?>

    <div class="profile">
        <div class="wrapper">
            <h1>My Profile</h1>
            <div class="profile-content">
                <div class="menu-section">
                    <a href="profile.php?section=my profile">
                        <div class="<?php echo $section == 'my profile'? 'option active' : 'option' ?>">
                            <span>Personal info</span>
                        </div>
                    </a>
                    <a href="profile.php?section=my requests">
                        <div class="<?php echo $section == 'my requests' ? 'option active' : 'option' ?>">
                            <span>My Requests</span>
                        </div>
                    </a>
                    <a href="profile.php?section=taskee history">
                        <div class="<?php echo $section == 'taskee history' || $section == 'taskee history details'? 'option active' : 'option' ?>">
                            <span>Accepted</span>
                        </div>
                    </a>
                    <a href="post task.php">
                        <div class="option">
                            <span>Post a task</span>
                        </div>
                    </a>
                    <a href="profile.php?section=tasker history">
                        <div class="<?php echo $section == 'tasker history' || $section == 'tasker history details' ? 'option active' : 'option' ?>">
                            <span>Tasker history</span>
                        </div>
                    </a>
                    <a href="index.php?logout=1">
                        <div class="option">
                            <span style="color: red;">Logout</span>
                        </div>
                    </a>
                </div>
                <!-- pages here -->
                <?php 
                    file_exists('inc/profile/'.$section.".php") ? include 'inc/profile/'.$section.'.php' : include '404.php';
                ?>
            </div> 
            
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>