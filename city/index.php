<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCity($bd);
$ciudades = $gestor->getList();
$op = Request::get("op");
$r = Request::get("r");
//var_dump($bd->getError());
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if($op!=null){
            echo "<h1>La operación $op ha dado como resultado $r</h1>";
        }
        foreach ($ciudades as $indice => $ciudad) {
            echo $ciudad;
            echo "<a class='borrar' href='phpdelete.php?ID={$ciudad->getID()}'>borrar</a> ";
            echo "<a href='viewedit.php?ID={$ciudad->getID()}'>editar</a>";
            echo "<br>";
        }
        ?>
        <script src="../js/scripts.js"></script>
    </body>
</html>
<?php
$bd->close();
