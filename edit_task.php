<?php
include "./db.php";
// Partials
include "./includes/header.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM task WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows(($result))== 1){
        $row = mysqli_fetch_array($result);
    }
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task SET title = '$title', description = '$description' WHERE id = $id";
  
    $result = mysqli_query($conn, $query);

    if(!$result){
        $_SESSION['message'] = "Failed update";
        $_SESSION['message_type'] = 'danger';
        die(header("Location: index.php"));
    }

    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'primary';

    header('Location: index.php');
}

?>
<!-- Main Content -->

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit_task.php?id=<?php echo $row['id'] ?>" method="POST">
                        <div class="form-group mt-2">
                            <input type="text" name="title" class="form-control" value="<?php echo $row['title'] ?>" placeholder="Update title">
                        </div>
                        <div class="form-group mt-2">
                            <textarea name="description" class="form-control" rows="2" placeholder="Update description"><?php echo $row['description'] ?></textarea>
                        </div>
                        <div class="form-group d-grid gap-2 mt-2">
                            <input type="submit" class="btn btn-success" name="update" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


<!-- Main Content -->
<?php include "./includes/footer.php"; ?>