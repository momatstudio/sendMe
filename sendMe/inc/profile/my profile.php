<?php 
    include 'backend/update-user.php';
    $username = $_SESSION['username'];
    $results = @mysqli_query($db, "SELECT * FROM users WHERE username='$username'")
?>     
<?php if($results):?>
    <?php while($data = mysqli_fetch_assoc($results)): ?>   
        <div class="more-detailed">
			<form method="POST" action="">
				<?php include('errors.php'); ?>
				<div class="input-group">
					<label>First Name</label>
					<input class="banner" type="text" name="firstName" value="<?php echo $data['firstName']?>" placeholder="First Name"/>
				</div>
				<div class="input-group">
					<label>Last Name</label>
					<input class="banner" type="text" name="lastName" value="<?php echo $data['lastName']?>"  placeholder="Last Name"/>
				</div>
				<div class="input-group">
					<label>Username</label>
					<input class="banner" type="text" name="username" value="<?php echo $data['username']?>" placeholder="Username" />
				</div>
				<div class="input-group">
					<label>Cell Number</label>
					<input class="banner" type="tel" id="phone" name="cellNo" minlentgh="10" maxlength="10" onkeyup="numbersOnly(this)" placeholder="Cell Number" value="0<?php echo $data['cellNo']?>"/>
				</div>
				<div class="input-group">
					<label>Email</label>
					<input class="banner" type="email" name="email" value="<?php echo $data['email']?>" placeholder="Email Address"/>
				</div>
				<div class="input-group">
					<label>Password</label>
					<input class="banner" type="password" name="password" value="<?php echo $data['password']?>" placeholder="Password"/>
				</div>
				<div class="input-group">
					<label>Address</label>
					<input class="banner" type="text" name="address" value="<?php echo $data['address']?>" placeholder="Address"/>
				</div>
				<div class="input-group">
					<label>Town</label>
					<input class="banner" type="text" name="town" value="<?php echo $data['town']?>" placeholder="Town"/>
				</div>
					<div class="input-group">
					<label>City</label>
				<input class="banner" type="text" name="city" value="<?php echo $data['city']?>" placeholder="City"/>
				</div>
				<div class="input-group">
					<label>Postal Code</label>
					<input class="banner" type="number" name="postalCode" value="0<?php echo $data['postalCode']?>" placeholder="Postal code"/>
				</div>
				<div class="input-group">
					<label>Country</label>
					<input class="banner" type="text" name="country" value="<?php echo $data['country']?>" placeholder="Country"/>
				</div>
				
				<script>
				function numbersOnly(input) {
					var regex = /[^0-9]/gi;
					input.value = input.value.replace(regex, "");
				}
				</script>

				<div class="input-group">
					<button class="btn" type="submit" class="btn" name="update_user">Update</button>
				</div>
			</form>
        </div>
    <?php endwhile?>
<?php endif?>