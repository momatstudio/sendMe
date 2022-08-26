<?php 
  session_start(); 
  $id = isset($_GET['t']) ? $_GET['t'] : null;
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: user.php?redirect=task&id='.$id.'');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: user.php");
  }
  include 'backend/tasker-requirements.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>sendMe | Single Task</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/header.css">
    <link rel="stylesheet" type="text/css" href="styles/single-task-page.css">
</head>
<body>
    <?php include 'inc/global/header.php'?>

    <div class="single-task">
        <div class="wrapper">
            <?php include 'backend/connection.php'?>
            <?php $result = @mysqli_query($db, "SELECT * FROM tasks WHERE id='$id'");?>
            <?php if($result):?>
                <?php while($data = mysqli_fetch_array($result)) :?>
                    <!-- <?php if($data['author'] == $_SESSION['username']):?>
                        <div class="edit-task"><a href="edit task.php?t=<?php echo $data['id']?>">EDIT</a></div>
                    <?php endif?> -->
                    <div class="task-content" id="task-content">
                        <div class="image">
                            <img src="images/<?php echo $data['image']?>" alt="" width="800">
                        </div>
                        <div class="task-texts">
                            <h1><?php echo $data['title']?></h1>
                            <br>
                            <p><?php echo $data['description']?></p>
                            <br>
                            <div style="border-bottom:1px solid #003CC2;"></div>
                            <br>
                            <div class="taskee">
                                <div>
                                    <b>Category:</b>
                                    <span><?php echo $data['category'] ?></span>
                                </div>

                                <div>
                                    <b>Date:</b>
                                    <span><?php echo $data['task_date'] ?></span>
                                </div>

                                <div>
                                    <b>Taskee:</b>
                                    <?php echo $data['author'] == $_SESSION['username'] ? ' <span style="color:red">(You)</span>' : '<span>'.$data['author'].'</span> '?>
                                </div>
                                <?php $author = $data['author']?>
                                <?php $result = mysqli_query($db, "SELECT * FROM users WHERE username='$author'");?>
                                <?php if($result) :?>
                                    <?php while($row= mysqli_fetch_array($result)) :?>
                                        <div>
                                            <b>Address:</b>
                                            <span><?php echo $row['town']?></span>
                                        </div>
                                    <?php endwhile?>
                                <?php endif?>                                
                            </div>
                            
                            <br>
                            <br>
                            <button class="btn" id="accept-work" >Accept Work</button>
                        </div>
                    </div>
                <?php endwhile?>
            <?php endif?>
            <div class="task-content tasker-section" id="tasker-section">
                <div class="cancel">
                    <span class="cancel-tasker-section" id="cancel-tasker-section">X</span>
                </div>

                <h2 style="text-align: center;">Tasker section</h2>
                <div class="tasker-requirements">
                    <form action="" method="POST">
                        <?php $result = @mysqli_query($db, "SELECT * FROM tasks WHERE id='$id'")?>
                        <?php if($result):?>
                        <?php while($data = mysqli_fetch_assoc($result)):?>
                            <input type="text" name="taskee" value="<?php echo $data['author']?>" hidden>
                            <input type="text" name="tasker" value="<?php echo $_SESSION['username']?>" hidden>
                            <input type="number" name="task_id" value="<?php echo $data['id']?>" hidden>
                            <input type="text" name="task_title" value="<?php echo $data['title']?>" hidden>
                            <input type="text" name="task_description" value="<?php echo $data['description']?>" hidden>
                            <input type="text" name="image" value="<?php echo $data['image']?>" hidden>
                        <?php endwhile?>
                        <?php endif?>

                        <div class="input-group">
                            <label for="">Price</label>
                            <input type="number" name="price" value="" placeholder="How much do you charge?">
                        </div>
                        <div class="input-group">
                            <label for="">Message</label>
                            <input type="text" name="message" value="" placeholder="Other things you may need to tell the taskee?">
                        </div>
                        <div class="input-group">
                           <button name="submit_requirements">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>