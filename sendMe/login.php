<?php include('backend/server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>sendMe | Login</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles/style.css">
  <link rel="stylesheet" type="text/css" href="styles/login-register.css">
  <link rel="stylesheet" type="text/css" href="styles/user.css">
</head>
<body>
  <div class="user login-register">
	<div class="wrapper">
		<h1 style="font-size: 70px;"><a href="user.php" style="color: #003CC2;">send</a>Me</h1>
		<div class="box">
			<form method="post" action="login.php">
				<?php include('errors.php'); ?>
				<input type="text" name="redirect" value="<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index'?>" hidden>
				<input type="text" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : null?>" hidden>
				<div class="input-group">
					<label>Username or Email</label>
					<input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : null?>" placeholder="Username or email"/>
				</div>
				<div class="input-group">
					<label>Password</label>
					<input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : null?>" placeholder="Password"/>
				</div>
				<div class="input-group">
					<button type="submit" class="btn" style="width: 220px" name="login_user">Login</button>
				</div>
				<p>
					Not yet a member?<a style="color: #003CC2" href="register.php">Sign up</a>
				</p>
			</form>
		</div>
	</div>
  </div>
</body>
</html>