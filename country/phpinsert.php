<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCity($bd);
$country = new Country();
$arrayCountry = $country->getArray();
$arrayCountryLeer = array();
foreach ($arrayCountry as $key => $value) {
    $arrayCountryLeer[] = Request::post($key);
}

$country->set($arrayCountryLeer);
$country->setCapital(null);

//$Name = Request::post("Name");
//$CountryCode = Request::post("CountryCode");
//$District = Request::post("District");
//$Population = Request::post("Population");


//$country = new City(0, $Name, $CountryCode, $District, $Population);
$r = $gestor->insert($country);
$bd->close();
echo $r;
var_dump($bd->getError());
//header("Location:index.php?op=insert&r=$r");