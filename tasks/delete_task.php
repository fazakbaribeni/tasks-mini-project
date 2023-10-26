<?php

include("../includes/db.php");
include("../tasks/Tasks.php");

if (isset($_POST['id']) && !empty($_POST['id'])) {

    $id = $_POST['id'];
    $deleteTask = new Tasks($dbh);
    $deleteTask->deleteTask($id);
    $_SESSION['message'] = 'Task Removed Successfully';
    $_SESSION['message_type'] = 'danger';
}

?>