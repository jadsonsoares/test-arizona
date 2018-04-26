<?php

class Country{

  private $country_list;

  public function __countruct(){

    $this->country_list = array();

  }

  public function setList($string){
    
    $data = explode("\n", $string);
    
    foreach ($data as $value) {
        
      $country = explode('  ', $value);
      
      if(isset($country[1])){
        
        $this->country_list[] = array(
          'CountryCode' => trim($country[0]),
          'CountryName' => trim($country[1])
        );
      }
    }
  }

  public function getList(){
    
    return $this->country_list;

  }
  
}
?>