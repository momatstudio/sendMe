<?php include('backend/server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>sendMe | Register account</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles/style.css">
  <link rel="stylesheet" type="text/css" href="styles/login-register.css">
  <link rel="stylesheet" type="text/css" href="styles/user.css">
</head>
<body>
<div class="login-register">
	<div class="wrapper" style="padding-top: 150px;">
		<h1 style=""><a href="user.php" style="color: #003CC2;">send</a>Me</h1>
		<div class="box">
			<form method="POST" action="">
				<?php include('errors.php'); ?>
				<input type="text" name="redirect" value="<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index'?>" hidden>
				<input type="text" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : null?>" hidden>
				<div class="input-group">
					<label>First Name</label>
					<input type="text" name="firstName" value="<?php echo isset($_POST['firstName']) ? $_POST['firstName'] : null?>" placeholder="First Name"/>
				</div>
				<div class="input-group">
					<label>Last Name</label>
					<input type="text" name="lastName" value="<?php echo isset($_POST['lastName']) ? $_POST['lastName'] : null?>"  placeholder="Last Name"/>
				</div>
				<div class="input-group">
					<label>Username</label>
					<input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : null?>" placeholder="Username" />
				</div>
				<div class="input-group">
					<label>Cell Number</label>
					<input type="tel" id="phone" name="cellNo" minlentgh="10" maxlength="10" onkeyup="numbersOnly(this)" placeholder="Cell Number" value="<?php echo isset($_POST['cellNo']) ? $_POST['cellNo'] : null?>"/>
						<label>County Code</label>
						<select name="countryCode" id="">
						<option value="<?php echo isset($_POST['countryCode']) ? $_POST['countryCode'] : null?>"><?php echo isset($_POST['countryCode']) ? $_POST['countryCode'] : 'Select'?></option>
						<option data-countryCode="ZA" value="+27">South Africa(+27)</option>
					</select>
				</div>
				<div class="input-group">
					<label>Email</label>
					<input type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : null?>" placeholder="Email Address"/>
				</div>
				<div class="input-group">
					<label>Password</label>
					<input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : null?>" placeholder="Password"/>
				</div>
				<div class="input-group">
					<label>Password</label>
					<input type="password" name="password_2" value="<?php echo isset($_POST['password_2']) ? $_POST['password_2'] : null?>" placeholder="Confirm password"/>
				</div>
				<div class="input-group">
					<label>Address</label>
					<input type="text" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : null?>" placeholder="Address"/>
				</div>
				<div class="input-group">
					<label>Town</label>
					<input type="text" name="town" value="<?php echo isset($_POST['town']) ? $_POST['town'] : null?>" placeholder="Town"/>
				</div>
					<div class="input-group">
					<label>City</label>
				<input type="text" name="city" value="<?php echo isset($_POST['city']) ? $_POST['city'] : null?>" placeholder="City"/>
				</div>
				<div class="input-group">
					<label>Postal Code</label>
					<input type="number" name="postalCode" value="<?php echo isset($_POST['postalCode']) ? $_POST['postalCode'] : null?>" placeholder="Postal code"/>
				</div>
				<div class="input-group">
					<label>Country</label>
					<input type="text" name="country" value="<?php echo isset($_POST['country']) ? $_POST['country'] : null?>" placeholder="Country"/>
				</div>
				
				<script>
				function numbersOnly(input) {
					var regex = /[^0-9]/gi;
					input.value = input.value.replace(regex, "");
				}
				</script>

				<div class="input-group">
					<button type="submit" class="btn" name="reg_user">Register</button>
				</div>
				<p>
					Already a member? <a style="color: #003CC2"href="login.php">Sign in</a>
				</p>
			</form>
		</div>
	</div>
</div>

</body>
</html>
