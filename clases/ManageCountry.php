<?php


class ManageCountry {
    private $bd = null;
    private $tabla = "country";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
     function getList(){
         $this->bd->select($this->tabla, "*", "1=1", array(), "Name, Continent, Code");
         $r=array();
         while($fila =$this->bd->getRow()){
             $country = new Country();
             $country->set($fila);
             $r[]=$country;
         }
         return $r;
    }
    
    function get($Code){
        //devuelve un objeto de la clase city
    }
    
    function delete($Code){
         $parametros = array();
        $parametros['Code'] = $Code;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function forzarDelete($Code){
        $parametros = array();
        $parametros['CountryCode'] = $Code;
        $gestor = new ManageCity($this->bd);
        $gestor->deleteCities($parametros);
        $this->bd->delete("countrylanguage", $parametros); //se deberia de hacer a traves de la clase
        $parametros = array();
        $parametros['Code'] = $Code;
        return $this->bd->delete($this->tabla, $parametros);
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
    
    function getValuesSelect(){
        $this->bd->query($this->tabla, "Code, Name", array(), "Name");
        $array = array();
        while($fila=$this->bd->getRow()){
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    
}
