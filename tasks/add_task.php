<?php

include("../includes/db.php");

if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $insert = $dbh->prepare("INSERT INTO tasks(title, description) VALUES(:title, :description)");
    $insert->execute([
        ':title'       => $title,
        ':description' => $description
    ]);

    if ($dbh->lastInsertId() > 0) {
        $_SESSION['message'] = 'Task Saved Successfully';
        $_SESSION['message_type'] = 'success';
        header('Location: ../index.php');
    }
}

?>