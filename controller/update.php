<?php
include '/FrameworkPHP/model/DbContext.php';
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $olddata = $db_Connection->prepare("SELECT * FROM task WHERE id = ? ");
    $olddata->bindParam(1, $id);
    $olddata->execute();
    $item = $olddata->fetch(PDO::FETCH_ASSOC);
}




if (!empty($_POST['task_name'])) {

    update();
}


function update()
{
    include '/FrameworkPHP/model/DbContext.php';
    $name = $_POST['task_name'];
    $numero = $_POST['numero'];
    $id = $_GET['id'];

    $Update = $db_Connection->prepare("UPDATE task SET task_name = ? , numero = ?  WHERE id = ?");
    $Update->bindParam(1, $name);
    $Update->bindParam(2, $numero);
    $Update->bindParam(3, $id);

    $Update->execute();
    header("Location: /public/");
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">Update item</h1>

    <div class="container" style="margin-top:80px;">
        <div class="form-group">
            <form method="POST">
                <label for="" class="mt-5 font-weight-bold text-danger ">Name</label>
                <input required value="<?php echo $item['task_name']; ?>" name="task_name" class="form-control w-25 mt-2" type="text">
                <input required value="<?php echo $item['numero']; ?>" type="number" name="numero" class="form-control w-25 mt-2" type="text">

                <button value="Add task" type="submit" class="mt-4 btn btn-warning">Update</button>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>