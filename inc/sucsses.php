<?php
                            if($sessionobject->ifisset('sucsses')){?>
                            <div class="alert alert-success"><?php echo $sessionobject->get("sucsses");?></div>
                            <?php
 
                            $sessionobject->unset("sucsses");
                            }?>