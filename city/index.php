<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCity($bd);
$page = Request::get("page");
if($page===null || $page ===""){
    $page = 1;
}
/*Nos devuelve el numero de paginas*/
$registros = $gestor->count();
$pages = ceil($registros/  Constant::NRPP);
/**/

$order = Request::get("order");
$sort = Request::get("sort");
$orden = "$order $sort";
$trozoEnlace ="";
if(trim($orden)!=""){
    $trozoEnlace = "&order=$order&sort=$sort";
}
$ciudades = $gestor->getList($page, trim($orden));
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
        <h2><?php if($op!=null){
              echo "<h1>La operación $op ha dado como resultado $r</h1>";
        }?></h2>
        
        
        <h2><a href="viewInsert.php">Insertar Ciudad</a></h2>
        
        <table border="1">
            <thead>
                <tr>
                    <th>
                        ID 
                        <a href="?order=ID&sort=desc">&Del;</a> 
                        <a href="?order=ID&sort=asc">&Delta;</a></th>
                    <th>
                        Nombre  
                        <a href="?order=Name&sort=desc">&Del;</a> 
                        <a href="?order=Name&sort=asc">&Delta;</a></th>
                    <th>
                        Codigo Pais  
                        <a href="?order=CountryCode&sort=desc">&Del;</a> 
                        <a href="?order=CountryCode&sort=asc">&Delta;</a></th>
                    <th>
                        Distrito  
                        <a href="?order=District&sort=desc">&Del;</a> 
                        <a href="?order=District&sort=asc">&Delta;</a></th>
                    <th>
                        Poblacion  
                        <a href="?order=Population&sort=desc">&Del;</a> 
                        <a href="?order=Population&sort=asc">&Delta;</a></th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="7">
                        <a href="?page=1<?php $trozoEnlace ?>">Primero</a>
                        <a href="?page=<?php echo max(1, $page-1).$trozoEnlace?>">Anterior</a>
                        <a href="?page=<?php echo min($page+1, $pages).$trozoEnlace?>">Siguiente</a>
                        <a href="?page=<?php echo $pages.$trozoEnlace ?>">Ultimo</a>
                        <form method="post" style="display: inline;" id="fselect" action=".">
                            
                            <?php 
                                $array = ["10"=>"10", "50"=>"50", "100"=>"100"];
                                echo Util::getSelect("rpp", $array, 10, false)  
                            ?>
                            <input type="submit" value="ver" />
                        </form>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($ciudades as $indice => $ciudad) { ?>
                <tr>
                    <td><?= $ciudad->getID() ?></td>
                    <td><?= $ciudad->getName() ?></td>
                    <td><?= $ciudad->getCountryCode() ?></td>
                    <td><?= $ciudad->getDistrict() ?></td>
                    <td><?= $ciudad->getPopulation() ?></td>
                    <td>
                        <a class='borrar' href='phpdelete.php?ID=<?= $ciudad->getID() ?>'>borrar</a> 
                        <a href='viewedit.php?ID=<?= $ciudad->getID() ?>'>editar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <script src="../js/scripts.js"></script>
    </body>
</html>
<?php
$bd->close();
