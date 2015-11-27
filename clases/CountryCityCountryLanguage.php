<?php


class CountryCityCountryLanguage {
    private $country, $city, $countryLanguage;
    
    function __construct(Country $country,  City $city, CountryLanguage $countryLanguage) {
        $this->country = $country;
        $this->city = $city;
        $this->countryLanguage = $countryLanguage;
    }

    function getCountry() {
        return $this->country;
    }

    function getCity() {
        return $this->city;
    }

    function getCountryLanguage() {
        return $this->countryLanguage;
    }

    function setCountry(Country $country) {
        $this->country = $country;
    }

    function setCity(City $city) {
        $this->city = $city;
    }

    function setCountryLanguage(CountryLanguage $countryLanguage) {
        $this->countryLanguage = $countryLanguage;
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
         while($fila =$this->bd->getRow()){
             $country = new Country();
             $country->set($fila);
             $city = new City();
             $city->set($fila,15); 
             $countrylanguage = new CountryLanguage();
             $countrylanguage->set($fila, 20);
             $r[] = new CountryCityCountryLanguage($country, $city, $countrylanguage);
         }
         return $r;
    }
    
}
