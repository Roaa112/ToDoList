<?php
namespace week11project\To_Do_List\classes;
class Session{
    //sessionعايزاة اول ما ياخد اوبجكت يفتح ال
    public function __construct(){
        session_start();
    }
    public function ifisset($key){
        return (!empty($_SESSION[$key]));
    }
    public function set($key,$value){
        $_SESSION[$key]=$value;
    }
    public function get($key){
        return (isset($_SESSION[$key]))?$_SESSION[$key]:null;
    }
    public function unset($key){
       unset($_SESSION[$key]);
    }
    public function destroy(){
       session_destroy();
    }
}