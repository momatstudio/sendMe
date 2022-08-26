<?php 
    if(isset($_GET['redirect']) && isset($_GET['id'])) $href = '?redirect='.$_GET['redirect'].'&id='.$_GET['id'].'';
    else if(isset($_GET['redirect'])) $href = '?redirect='.$_GET['redirect'].'';
    else $href = null
?>
<!DOCTYPE html>
<html>
<head>
<title>sendMe | Log in or register account</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/user.css">
</head>
<body>
    <div class="user">
        <div class="wrapper">
            <h1 style="font-size: 70px;"><a href="index.php" style="color: #003CC2;">send</a>Me</h1>
            <div class="box">
                <?php echo isset($_GET['redirect']) ? '<span style="color: red;">You must login or register first</span>' : null?>
                <a id="login" href="login.php<?php echo $href?>">Login</a>
                <span>or</span>
                <a id="register" href="register.php<?php echo $href?>">Register</a>
            </div>
        </div>
    </div>
</body>
</html>