<?php


class ManageCountry {
    private $bd = null;
    private $tabla = "city";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function get($Code){
        //devuelve un objeto de la clase city
    }
    
    function delete($Code){
        //borrar la ciudad por id numero de filas borradas
        return $this->delete($Code);
        
    }
    
    function erase(Country $country){
        return $this->delete($country->getID());
    }
    
    function set(Country $country, $pkCode){
        //Update de todos los campos menos el id, el id se usara como el where para el update numero de filas modificadas
    }
    
    function insert(Country $country){
        //Se pasa un objeto city y se inserta, se devuelve el id del elemento con el que se ha insertado
    }
}
