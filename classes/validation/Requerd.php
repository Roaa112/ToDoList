<?php
namespace week11project\To_Do_List\classes\validation;
//هستخدم الانترفيس اذا لازم استدعي الملف
require_once 'Validator.php';
use week11project\To_Do_List\classes\validation\Validator;


class Requerd implements Validator{
    public function check($key,$value){
        if(empty($value)){
            return "$key is requird";
        }else{
            return false;
        }


    }
}




?>