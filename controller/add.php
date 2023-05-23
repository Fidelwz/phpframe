<?php

if (is_string($_POST['task_name']) && is_numeric( $_POST['numero'])   ) {
    datasave();
} else {
    echo "Error task_name is requid";
}



function datasave()
{
    include "/FrameworkPHP/model/DbContext.php";
    $name = $_POST['task_name'];
    $numero = $_POST['numero'];

    try {
        $datasave = $db_Connection->prepare("INSERT INTO task (task_name, numero) VALUES (?, ?)");
        $datasave->bindParam(1, $name);
        $datasave->bindParam(2, $numero);
        $datasave->execute();

        echo "<h1>Data saved successfully</h1>";

        header("Location: /public/index.php");
        exit();
    } catch (PDOException $e) {
        echo "<h1>Data save failed: " . $e->getMessage() . "</h1>";
    }
}





?>