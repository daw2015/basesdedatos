<?php
    if(isset($_GET["uno"])) $v1 = $_GET["uno"];
    if(isset($_GET["dos"])) $v2 = $_GET["dos"];
    echo $_GET["uno"];
    echo "<br>";
    echo $_GET["dos"];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="otromas.php">
            <input type="text" name="uno" value="" />
            <input type="text" name="dos" value="" />
            <input type="text" name="tres" value="uno=&dos=" />
            <input type="submit" value="Enviar" />
        </form>
    </body>
</html>
