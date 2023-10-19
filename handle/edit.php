<?php
//connection with pdo and app (session , request ,validation)
require_once '../inc/connection.php';
require_once '../App.php';
//submit
if($requestobject->checkpost("submit")){
    if($requestobject->checkget("id")==0){
        $requestobject->header("../index.php");
    }
    //catch 
    $id=$requestobject->get("id");
    $result=$conn->query("select * from do where id =$id");
   
    $posts=$result->fetch(PDO::FETCH_ASSOC);
    if(count($posts)>0){
    $title=$requestobject->clean($requestobject->post("title"));
    //validation 
    $validateobject->Validate("title",$title,["Str","Requerd"]);
    $errors=$validateobject->geterrors();
    if (empty($errors)){
        // دة اصلاidاتاكد ان في 
        $result=$conn->prepare("update do set `title`=:title where id=:id");
        $result->bindparam(":title",$title);
        $result->bindparam(":id",$id,PDO::PARAM_INT);
        $check=$result->execute();
       if($check){
        $sessionobject->set('sucsses',"title updated sucssesfuly");
        $requestobject->header("../index.php");
       }else{
        $sessionobject->set('errors',["error while update"]);
        $requestobject->header("../edit.php?id=$id");
       }

    }else{
        $sessionobject->set('errors',["there is no title like that"]);
        $requestobject->header("../edit.php?id=$id");

    }
    }else{
        //store the errors in session 
        $sessionobject->set('errors',$errors);
        $requestobject->header("../edit.php?id=$id");
    }
}else{
    $requestobject->header("../index.php");
}

