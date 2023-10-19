
<?php
require_once '../App.php';
require_once '../inc/connection.php';

if(($requestobject->checkget("id"))==0){
    header("location:../index.php");
}
$id=$requestobject->get("id");
$result=$conn->query("select * from do where id =$id");
   
    $posts=$result->fetch(PDO::FETCH_ASSOC);
    if(count($posts)>0){

$result=$conn->prepare("delete from do  where id=:id");
$result->bindparam(":id",$id,PDO::PARAM_INT);
$check=$result->execute();
if($check){
    $sessionobject->set('sucsses',"to do titil deleted sucssesfuly");
        header("location:../index.php");
}else{
    $sessionobject->set('errors',["error while update"]);
    header("location:../index.php");
}
    }else{
        $sessionobject->set('errors',["there is no post with this id"]);
        header("location:../index.php");
    }
?>