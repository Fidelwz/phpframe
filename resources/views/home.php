<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Foreach</h1>

    <div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Numero</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     <?php foreach($data as $item){?>
    <tr>
      <th scope="row"><?php echo $item['id']?></th>
      <td colspan="2"><?php echo $item['task_name'] ?></td>
      <td><?php echo $item['numero'] ?></td>
      <td><a href="delete/<?php echo $item['id']?>" class="btn btn-danger">Eliminar</a></td>
    </tr> 
    <?php }?>
  </tbody>
</table>
</div>



       
</body>
</html>