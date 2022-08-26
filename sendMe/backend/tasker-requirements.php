<?php 
    require_once 'backend/connection.php';
    $errors = array();

    if(isset($_POST['submit_requirements'])) {
        $taskee = mysqli_real_escape_string($db, $_POST['taskee']);
        $tasker = mysqli_real_escape_string($db, $_POST['tasker']);
        $tastId = mysqli_real_escape_string($db, $_POST['task_id']);
        $title = mysqli_real_escape_string($db, $_POST['task_title']);
        $description = mysqli_real_escape_string($db, $_POST['task_description']);
        $price = mysqli_real_escape_string($db, $_POST['price']);
        $message = mysqli_real_escape_string($db, $_POST['message']);
        $image = mysqli_real_escape_string($db, $_POST['image']);

        if(empty($price)) array_push($errors, "Please enter the price");

        if(count($errors) == 0){
            $query = "INSERT INTO accepted (taskee, tasker, task_title, task_description, price, message, image, task_id)
                      VALUES ('$taskee', '$tasker', '$title', '$description', '$price', '$message', '$image', '$tastId')";
            mysqli_query($db, $query);
            header("location: profile.php?section=tasker history");
        }
    }
?>