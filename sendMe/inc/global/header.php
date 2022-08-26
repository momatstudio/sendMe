<?php
	include 'backend/connection.php';
	$results = @mysqli_query($db, "SELECT category FROM tasks");
?>
<header>
	<?php $username = isset($_SESSION['username']) ? $_SESSION['username'] : null ?>
	<div class="wrapper">
		<a id="logo" href="index.php"><span style="color: #003CC2; font-weight: bold">send</span>Me</a>
		<nav>
			<ul>
				<!-- <li><a href="">Areas</a></li> -->
				<li id="services"><a href="all tasks.php">Tasks</a>
				<li id="services"><a href="taskers.php">Taskers</a>
				</li>
				<li><?php echo $username ? "<a href='profile.php'> Hi $username!</a>" : "<a href='user.php'>Login or register</a>" ?></li>
				<li><a href="post task.php"><button class="btn" style="padding: 0 30px">Post a task</button></a></li>
				<li id="menu-icon"><img src="menu-icon.png" alt="" width="30" height="20"></li>
				<li id="menu-cancel-icon">X</li>
			</ul>
		</nav>
	</div>
</header>
<div class="mobile-menu" id="mobile-menu">
	<ul>
		<li id="services"><a href="all tasks.php">All tasks</a>
		<li><?php echo $username ? "<a href='profile.php'>$username</a>" : "<a href='user.php'>Sign in or Sign up</a>" ?></li>
		<li><a href="post task.php"><button class="btn" style="padding: 0 30px">Post a task</button></a></li>
	</ul>
</div>
<script>
	const menuIcon = document.getElementById("menu-icon"),
	menuCancelIcon = document.getElementById("menu-cancel-icon"),
	mobileMenu = document.getElementById("mobile-menu");

	menuIcon.addEventListener("click", ()=>{
		menuIcon.style.display = "none";
		menuCancelIcon.style.display = "block";
		mobileMenu.style.display = "block";
	});

	menuCancelIcon.addEventListener("click", ()=>{
		menuCancelIcon.style.display = "none";
		menuIcon.style.display = "block";
		mobileMenu.style.display = "none";
	});
</script>
