<?php
include "./db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM task WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if(!$result){
        $_SESSION['message'] = "Failed deletion";
        $_SESSION['message_type'] = 'danger';
        die(header("Location: index.php"));
    }

    $_SESSION['message'] = 'Task Deleted Successfully';
    $_SESSION['message_type'] = 'danger';

    header('Location: index.php');
}