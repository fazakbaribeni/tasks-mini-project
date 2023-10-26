<?php

class Tasks
{
    public function __construct($dbh) {
        $this->dbh = $dbh;
    }


    /***
     * Get all tasks
     * @return array
     */
    function  getAllTasks() :array
    {
        $data = array();
        $sql = $this->dbh->prepare("SELECT * FROM tasks ORDER BY id DESC");
        $sql->execute();
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        return (array) $data;
    }


    /**
     * @param $id
     * @return void
     */
    function deleteTask($id)
    {
        $delete = $this->dbh->prepare("DELETE FROM tasks WHERE id = ?");
        $delete->execute([$id]);

    }


    /*** UPDATE TASK Content
     * @param $data
     * @return void
     */
    function updateTask($data = array())
    {

        $update = $this->dbh->prepare("UPDATE tasks set title = ?, description = ? WHERE id=?");
        $update->execute([$data['title'], $data['description'], $data['id']]);
    }


    /** Return Task by ID
     * @param $id
     * @return mixed
     */
    function getTaskById($id):array
    {
        $sql  = $this->dbh->prepare("SELECT * FROM tasks WHERE id=?");
        $sql->execute([$id]);
        return $sql->fetch(PDO::FETCH_ASSOC);

    }

}