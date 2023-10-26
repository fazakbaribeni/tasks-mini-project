<?php
include("../includes/db.php");
include("../tasks/Tasks.php");

$title = '';
$description= '';

if  (isset($_GET['id']) && $_GET['id'] == '') {
    $task = new Tasks($dbh);
    $id = $_GET['id'];
    $data = $task->getTaskById($id);
}

if (isset($_POST['id']) && !empty($_POST['id'])) {


    $taskUpdate = new Tasks($dbh);

    $arrayUpdate = [
        "title"       => $_POST['title'],
        "id"          => $_POST['id'],
        "description" => $_POST['description']
    ];
    $taskUpdate->updateTask($arrayUpdate);
    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: ../index.php');
    die();
}

?>
<?php include('../includes/header.php'); ?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit_task.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                        <div class="form-group">
                            <input name="title" type="text" class="form-control mt-3" value="<?php echo e($data['title']); ?>" placeholder="Update Title">
                        </div>
                        <div class="form-group">
                            <textarea name="description" class="form-control mt-3" cols="30" rows="10"><?php echo  e($data['description']); ?></textarea>
                        </div>
                        <button class="btn btn-primary mt-3"  name="update">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include('../includes/footer.php'); ?>