<?php
include_once './db.php';

if(isset($_POST['save_task'])){
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO task(title, description) VALUES('$title', '$description')";
    $result = mysqli_query($conn,$query);

    if(!$result){
        $_SESSION['message'] = "Save failed";
        $_SESSION['message_type'] = 'danger';
        die(header("Location: index.php"));
    }

    $_SESSION['message'] = 'Task Saved Successfully';
    $_SESSION['message_type'] = 'success';

    header('Location: index.php');
    
}
