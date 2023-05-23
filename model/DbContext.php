
<?php
try {
    $db_Connection = new PDO('mysql:host=localhost;dbname=Dbtest;', 'root', 'Passwordxd');
  
   
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
