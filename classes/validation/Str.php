<?php
namespace week11project\To_Do_List\classes\validation;

//هستخدم الانترفيس اذا لازم استدعي الملف
//name spaceلازم استخدم ال 
require_once 'Validator.php';
use week11project\To_Do_List\classes\validation\Validator;

class Str implements Validator{
    public function check($key,$value){
        if(is_numeric($value)){
            return "$key is must be string";
        }else{
            return false;
        }

        }

}







?>