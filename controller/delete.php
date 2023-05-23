<?php

if (!empty($_POST['id'])) {
    delete();
}

function delete()
{
    include '/FrameworkPHP/model/DbContext.php';
    $id = $_POST['id'];
    try {
        $delete = $db_Connection->prepare("DELETE FROM task WHERE id = ?");
        $delete->bindParam(1, $id);
        $delete->execute();

        header("Location: /public/index.php");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
    }
}
