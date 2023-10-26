<?php

include("../includes/db.php");

if (isset($_POST['id']) && !empty($_POST['id'])) {

    $id = $_POST['id'];
    $delete = $dbh->prepare("DELETE FROM tasks WHERE id = ?");
    $delete->execute([$id]);
    $_SESSION['message'] = 'Task Removed Successfully';
    $_SESSION['message_type'] = 'danger';
}

?>