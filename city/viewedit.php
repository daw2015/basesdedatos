<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCity($bd);
$id = Request::get("ID");
$city = $gestor->get($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!-- Si la clave principal no es autonumerica tengo que ponerla dos 
        veces, una vez en hidden para que no se modifique y otra visible para
        modificarla, hay que darle dos nombres diferentes -->
        <form action="phpedit.php" method="POST">
            <input type="text" name="Name" value="<?php echo $city->getName(); ?>" /><br/>
            <input type="text" name="CountryCode" value="<?php echo $city->getCountryCode(); ?>" /><br/>
            <input type="text" name="District" value="<?php echo $city->getDistrict(); ?>" /><br/>
            <input type="number" name="Population" value="<?php echo $city->getPopulation(); ?>" /><br/>
            <input type="hidden" name="pkID" value="<?php echo $city->getID(); ?>" /><br/>
            <input type="submit" value="edicion"/>
        </form>
    </body>
</html>
<?php
$bd->close();