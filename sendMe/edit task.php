<?php 
  session_start(); 
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: user.php?redirect=post task');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: user.php");
  }
  include 'backend/post-task.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>sendMe | Post task</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/header.css">
    <link rel="stylesheet" type="text/css" href="styles/post-task.css">
    <link rel="stylesheet" type="text/css" href="styles/login-register.css">
</head>
<body>
    <?php include 'inc/global/header.php'?>
    <?php 
        $id = isset($_GET['t']) ? $_GET['t'] : null;
        $results = @mysqli_query($db, "SELECT * FROM tasks WHERE id='$id'")
    ?>
    <?php if($results) :?>
        <?php while($data = mysqli_fetch_array($results)):?>
            <div class="post-task">
                <div class="wrapper">
                    <h1 style="font-size: 50px;"><a style="color: #003CC2;">Post a task</a></h1>
                    <br>
                    <div class="box">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <?php include('errors.php'); ?>
                            <input type="text" name="author" value="<?php echo $data['username']?>" placeholder="Username" hidden/>
                            <div class="input-group">
                                <label>Title</label>
                                <input type="text" name="title" value="<?php echo $data['title']?>" placeholder="Title"/>
                            </div>
                            <div class="input-group">
                                <label>Description</label>
                                <textarea name="description" value="<?php echo $data['description']?>" rows="6" cols="50"></textarea>
                            </div>
                            <div class="input-group">
                                <img id="preview" width="380" alt="">
                            </div>
                            <div class="input-group">
                                <label>Image</label>
                                <img src="images/<?php echo $data['image']?>" id="initial-image" alt="<?php echo $data['image']?>" height="200">
                                <input type="text" name="replace_photo" value="<?php echo $data['image']?>">
                                <input type="file" id="upload-input" name="photo" value="" placeholder="Picture" hidden/>
                            </div>
                            <div class="input-group">
                                <button class="button" id="upload-button">Replace Image</button>
                            </div>
                            <div class="input-group">
                                <label>Category</label>
                                <select name="category" id="">
                                    <option value="<?php echo $data['category']?>"><?php echo $data['category']?></option>
                                    <option value="Electronic Repairs">Electronic Repairs</option>
                                    <option value="Loundry">Loundry</option>
                                    <option value="House Cleaning">House Cleaning</option>
                                    <option value="House Painting">House Painting</option>
                                    <option value="Plumbing">Plumbing</option>
                                    <option value="Food delivery">Food delivery</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <input type="submit" class="button submit" name="update_task" value="Submit" placeholder="Description"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endwhile?>
    <?php endif?>
<script>
        const uploadButton = document.getElementById("upload-button"),
              uploadInput = document.getElementById("upload-input"),
              preview = document.getElementById("preview"),
              initialImage = document.getElementById("initial-image");

        uploadButton.addEventListener("click", (e) => {
        e.preventDefault();
        uploadInput.click();
    });

    const loadImage = ()=>{
        let file = uploadInput.files[0];
        if(!file) return;
        // console.log(file);
        preview.src =URL.createObjectURL(file);
        initialImage.style.display = "none";
    }
    uploadInput.addEventListener("change", loadImage)
    </script>
</body>