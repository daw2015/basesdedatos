<?php
    require './clases/AutoCarga.php';
    $bd = new DataBase();
    $sql = "select * from country where Code > :code and Population > :population";
    $parametros = array();
    $parametros["code"] = "T";
    $parametros["population"] = 23;
    //$bd->send($sql, $parametros);
    $bd->query("country", "*");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            while($fila = $bd->getRow()){
                echo $fila[0] . " " . $fila[1]. "<br/>";
            }
        ?>
    </body>
</html>
<?php
$bd->close();
