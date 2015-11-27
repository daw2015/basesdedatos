<?php

/*OTRA FORMA*/
class ManageRelations {
  
    private $bd = null;
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
     
    function getListCountryCityCountryLanguage($condicion = null, $parametros = array()){
        if($condicion === null){
            $condicion = "";
        }else{
            $condicion = "where $condicion";
        }
        $sql = " select co.*, ci.*, cl.*
                    from country co
                    left join city ci
                    on co.Code = ci.CountryCode
                    left join countrylanguage cl 
                    on co.Code =  cl.CountryCode $condicion";
         $this->bd->send($sql, $parametros);
         $r=array();
         $contador = 0;
         while($fila =$this->bd->getRow()){
             $country = new Country();
             $country->set($fila);
             $city = new City();
             $city->set($fila,15); //el numero es a partir del ultimo campo de country, para que coja los de city
             //$countrylanguage = new CountryLanguage();
             //$countrylanguage->set($fila, 20);
             $r[$contador]["country"]=$country;
             $r[$contador]["city"]=$city;
             //$r[$contador]["countrylanguage"]=$countrylanguage;
             $contador++;
         }
         return $r;
    }
    
    

    
}
