<?php include("includes/db.php"); ?>

<?php include('includes/header.php'); ?>

    <main class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <!-- MESSAGES -->

                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php session_unset(); } ?>

                <!-- ADD TASK -->
                <div class="card card-body">
                    <form action="tasks/add_task.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control mt-3" placeholder="Task Description"></textarea>
                        </div>
                        <input type="submit" name="save_task" class="btn btn-primary btn-sm mt-3" value="Save Task">
                    </form>
                </div>
            </div>
            <div class="col-md-8 card card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date Added</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                     include "tasks/Tasks.php";
                     $tasks = new Tasks($dbh);
                     $all_tasks = $tasks->getAllTasks();

                    foreach($all_tasks as $task) { ?>
                        <tr>
                            <td><?php echo e($task['title']); ?></td>
                            <td><?php echo e($task['description']); ?></td>
                            <td><?php echo $task['date_added']; ?></td>
                            <td>
                                <a href="tasks/edit_task.php?id=<?php echo $task['id']?>" class="btn btn-secondary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" id="<?php echo $task['id'] ?>" class="btn btn-danger deleteTask">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

<?php include('includes/footer.php'); ?>