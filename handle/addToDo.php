<?php
//connection with pdo and app (session , request ,validation)
require_once '../inc/connection.php';
require_once '../App.php';
//submit
if($requestobject->checkpost("title")){
    //catch 
    $title=$requestobject->clean($requestobject->post("title"));
    //validation 
    $validateobject->Validate("title",$title,["Str","Requerd"]);
    $errors=$validateobject->geterrors();
    if (empty($errors)){
       //insert
       $result=$conn->prepare("insert into do (`title`) values(:title)");
       $result->bindparam(":title",$title);
       $check=$result->execute();
       if($check){
           $sessionobject->set('sucsses',"add to to sucssesfuly");
           $requestobject->header("../index.php");
       }else{
           $sessionobject->set('errors',["error while add to do"]);
           $requestobject->header("../index.php");
       }
    }else{
        //store the errors in session 
        $sessionobject->set('errors',$errors);
        $requestobject->header("../index.php");
    }



}else{
    $requestobject->header("../index.php");
}


//insert or show errors
