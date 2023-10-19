<?php

//connection with pdo and app (session , request ,validation)
require_once '../inc/connection.php';
require_once '../App.php';
//submit
if($requestobject->checkget("id")&&$requestobject->checkget("statues")){
   
    //catch 
    $id=$requestobject->get("id");
    $statues=$requestobject->get("statues");
    $result=$conn->query("select * from do where id =$id");
    $posts=$result->fetch(PDO::FETCH_ASSOC);
    if(count($posts)>0){
        // دة اصلاidاتاكد ان في 
        $result=$conn->prepare("update do set `statues`=:statues where id=:id");
        $result->bindparam(":statues",$statues);
        $result->bindparam(":id",$id,PDO::PARAM_INT);
        $check=$result->execute();
       if($check){
        $sessionobject->set('sucsses',"statues updated sucssesfuly");
        $requestobject->header("../index.php");
       }else{
        $sessionobject->set('errors',["error while update"]);
        $requestobject->header("../index");
       }

    }else{
        $sessionobject->set('errors',["there is no title like that"]);
        $requestobject->header("../index");

    }
    
}else{
    $requestobject->header("../index.php");
}


