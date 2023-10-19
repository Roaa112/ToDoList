<?php
namespace week11project\To_Do_List\classes;
class Request{
    public function get($key){
        return (isset($_GET[$key]))?$_GET[$key]:"get request is not exiest";
    }
    public function checkget($key){
        //true or false
        return (isset($_GET[$key]));
    }
    public function checkpost($key){
        //true or false
        return (isset($_POST[$key]));
    }
    public function post($key){
        return (isset($_POST[$key]))?$_POST[$key]:null;
    }
    public function clean($value){
        return trim(htmlspecialchars($value));
    }
    public function header($location){
        return header("location:$location");
    }
}
?>