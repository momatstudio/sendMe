<?php 
    require_once 'backend/connection.php';
    $errors = array();

    if(isset($_POST['chat'])) {
        $text = mysqli_real_escape_string($db, $_POST['text']);
        $tasker_username = mysqli_real_escape_string($db, $_POST['tasker_username']);
        $taskee_username = mysqli_real_escape_string($db, $_POST['taskee_username']);
        $isTasker = mysqli_real_escape_string($db, $_POST['isTasker']);


        if(empty($tasker_username)) array_push($errors, "Tasker username is required");
        if(empty($taskee_username)) array_push($errors, "taskee username is required");
        if(empty($text)) array_push($errors, "Text is required");

        if(count($errors) == 0){
            $query = "INSERT INTO chat (tasker_username, taskee_username, text, isTasker)
                      VALUES ('$tasker_username', '$taskee_username', '$text','$isTasker')";
            mysqli_query($db, $query);
            
        }
    }
?>