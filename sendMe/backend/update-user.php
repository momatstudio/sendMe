<?php
$errors = array(); 
include 'backend/connection.php';

if (isset($_POST['update_user'])) {
  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $cellNo = mysqli_real_escape_string($db, $_POST['cellNo']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $town = mysqli_real_escape_string($db, $_POST['town']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $postalCode = mysqli_real_escape_string($db, $_POST['postalCode']);
  $country = mysqli_real_escape_string($db, $_POST['country']);

  if (empty($firstName)) { array_push($errors, "First name is required"); }
  if (empty($lastName)) { array_push($errors, "Last name is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($cellNo)) { array_push($errors, "Cell No is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($town)) { array_push($errors, "Town is required"); }
  if (empty($city)) { array_push($errors, "City is required"); }
  if (empty($postalCode)) { array_push($errors, "Postal code is required"); }
  if (empty($country)) { array_push($errors, "Country is required"); }
 
  if (count($errors) == 0) {

  	$query ="UPDATE users 
             SET firstName = '$firstName',
                lastName = '$lastName',
                cellNo = '$cellNo',
                email = '$email',
                password = '$password',
                address = '$address',
                town = '$town',
                city = '$city',
                postalCode = '$postalCode',
                country = '$country'
            WHERE username ='$username'";
  	mysqli_query($db, $query);
  }
}

?>