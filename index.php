<?php 
require_once 'inc/header.php';
require_once 'inc/connection.php';
require_once 'App.php';
?>
<body>
    
    <div class="container my-3 ">    
        <div class="row d-flex justify-content-center">
       
                <div class="container mb-5 d-flex justify-content-center">
               

                    <div class="col-md-4">
                        <form action="handle/addToDo.php" method="post">
                            <?php
                            //session show data
                            require_once 'inc/errors.php';
                           ?>
                            <?php
                            require_once 'inc/sucsses.php';
                           ?>
                            
                            
                        <textarea type="text" class="form-control" rows="3" name="title" id="" placeholder="enter your note here"></textarea>
                        <div class="text-center">
                            <button type="submit" name="addtodo" class="form-control text-white bg-info mt-3 " >Add To Do</button>
                        </div>
                        </form>
                    </div>
                </div>
               

        </div>
        <div class="row d-flex justify-content-between">   
            <!-- all -->
            <div class="col-md-3 "> 
                <h4 class="text-white">All Notes</h4>
                <?php  $result=$conn->query("select * from do where statues='all'");
                   if($result->rowCount()>0):
                    $notes=$result->fetchAll();
                    foreach($notes as $note):
                   ?>
                    <div class="alert alert-info p-2">
                                <h4 ><?php echo $note['title']?></h4>
                                <h5><?php echo $note['created_at']?></h5>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="edit.php?id=<?php echo $note['id']?>"class="btn btn-info p-1 text-white" >edit</a>
                                   
                                    <a href="handle/goto.php?id=<?php echo $note['id']?>&statues=doing "class="btn btn-info p-1 text-white" >doing</a>
                                </div>
                            
                        </div>
                        <?php endforeach; else:?>
                
                <div class="m-2  py-3">
                    <div class="show-to-do">

                            <div class="item">
                                <div class="alert-info text-center ">
                                 empty to do
                                </div>
                            </div>
                    
                       
                    </div>
                </div>
                <?php endif;?>

            </div>

            <!-- doing -->
            <div class="col-md-3 ">
            
                <h4 class="text-white">Doing</h4>
                <?php  $result=$conn->query("select * from do where statues='doing'");
                   if($result->rowCount()>0):
                    $doing=$result->fetchAll();
                    foreach($doing as $note):
                   ?>
                   <div class="alert alert-success p-2">
                                <h4 ><?php echo $note['title']?></h4>
                                <h5><?php echo $note['created_at']?></h5>
                                <div class="d-flex justify-content-between mt-3">
                                    <a></a>
                                    <a href="handle/goto.php?id=<?php echo $note['id']?>&statues=done  "class="btn btn-success p-1 text-white" >Done</a>
                                </div>
                            
                        </div>
                        <?php endforeach; else:?>
                
                <div class="m-2 py-3">
                    <div class="show-to-do">

                   
                            <div class="item">
                                <div class="alert-success text-center ">
                                 empty to do
                                </div>
                            </div>
                    
                        
                    </div>
                </div>
                <?php endif;?>
            
            </div>
           
            <!-- done -->
            <div class="col-md-3">
                <h4 class="text-white">Done</h4>
                <?php  $result=$conn->query("select * from do where statues='done'");
                   if($result->rowCount()>0):
                    $done=$result->fetchAll();
                    foreach($done as $note):
                   ?>
                     <div class="alert alert-warning p-2">
                                 <a href="handle/delete.php?id=<?php echo $note['id']?>"
                                 onclick="confirm('are your sure')" 
                                 class="remove-to-do text-dark d-flex justify-content-end " >
                                 <i class="fa fa-close" style="font-size:16px;" ></i></a>     
                               
                                                                                            
                                                                                           
                                <h4 ><?php echo $note['title']?></h4>
                               <h5><?php echo $note['created_at']?></h5>
                               
                            
                        </div>
                        <?php endforeach; else:?>

                <div class="m-2 py-3">
                    <div class="show-to-do">

                            <div class="item">
                                <div class="alert-warning text-center ">
                                 empty to do
                                </div>
                            </div>
                    
                      
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>

</body>
</html>