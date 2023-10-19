<?php
namespace week11project\To_Do_List\classes\validation;
require_once 'Str.php';
require_once 'Requerd.php';

class Validate{
    private $errors=[];
    public function Validate($key,$value,$rules){
        foreach($rules as $rule){
            //use name space
            $rule="week11project\To_Do_List\classes\\validation\\".$rule;
            //object
            $rule=new $rule;

            $error=$rule->check($key,$value);
            if($error !=false){
                $this->errors[]=$error;
            }
        }
    }
    public function geterrors(){
        return $this->errors;
    }

}


?>