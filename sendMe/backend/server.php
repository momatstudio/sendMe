 <?php
session_start();
$errors = array(); 
include 'backend/connection.php';

// REGISTER USER
if (isset($_POST['reg_user'])) {
  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $cellNo = mysqli_real_escape_string($db, $_POST['cellNo']);
  $countryCode = mysqli_real_escape_string($db, $_POST['countryCode']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $town = mysqli_real_escape_string($db, $_POST['town']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $postalCode = mysqli_real_escape_string($db, $_POST['postalCode']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $redirect = mysqli_real_escape_string($db, $_POST['redirect']);
  $id = mysqli_real_escape_string($db, $_POST['id']);

  if (empty($firstName)) { array_push($errors, "First name is required"); }
  if (empty($lastName)) { array_push($errors, "Last name is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($cellNo)) { array_push($errors, "Cell No is required"); }
  if (empty($countryCode)) { array_push($errors, "Country code is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($password_2)) { array_push($errors, "Please re-enter the password"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($town)) { array_push($errors, "Town is required"); }
  if (empty($city)) { array_push($errors, "City is required"); }
  if (empty($postalCode)) { array_push($errors, "Postal code is required"); }
  if (empty($country)) { array_push($errors, "Country is required"); }
 
  if ($password != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' OR cellNo='$cellNo'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
    if ($user['cellNo'] === $cellNo) {
      array_push($errors, "Cell number already exists");
    }
  }

  if (count($errors) == 0) {
  	// $password = md5($password_1);

  	$query = "INSERT INTO users (firstName, lastName, username, cellNo, countryCode, email, password, address, town, city, postalCode, country) 
  			  VALUES('$firstName', '$lastName', '$username', '$cellNo', '$countryCode', '$email', '$password', '$address', '$town', '$city', '$postalCode', '$country')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	$id ? header("location: $redirect.php?t=$id") : header("location: $redirect.php");
  }
}



// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $redirect = mysqli_real_escape_string($db, $_POST['redirect']);
  $id = mysqli_real_escape_string($db, $_POST['id']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	// $password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);

  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
      $id ? header("location: $redirect.php?t=$id") : header("location: $redirect.php");
  	} 
    else if (mysqli_num_rows($results) == 0){
      $query = "SELECT * FROM users WHERE email='$username' AND password='$password'";
  	  $results = mysqli_query($db, $query);

      if (mysqli_num_rows($results) == 1) {
        while($row = mysqli_fetch_assoc($results)){
          $_SESSION['username'] = $row['username'];
        }
        $_SESSION['success'] = "You are now logged in";

        $id ? header("location: $redirect.php?t=$id") : header("location: $redirect.php");
        
      } else array_push($errors, "Wrong username or password");
    } 
  }
}

?>