<?php
namespace App\Libraries;

class PhoneRules{
  public function mobile(string $str, string $fields, array $data){
    if(preg_match( '/^[5-9]{1}[0-9]+/', $data['handphone'])){
      $bool = preg_match('/^[0-9]{10}+$/', $data['handphone']);
      return $bool == 0 ? false : true; 
    }else{
      return false;
    }
  }

  public function phone(string $str, string $fields, array $data){
    if(preg_match( '/^\(?[0-9]{3}\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}$/', $data['telepon'])){
      return true; 
    }else{
      return false;
    }
  }
}
