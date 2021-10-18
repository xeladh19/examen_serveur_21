<?php
  /*
    ./app/router.php
  */
  use \App\Controllers\PostsController;
 



        if(isset($_GET['post'])):
          include_once '../app/router/postsRouter.php';
          
    
        
      
# --------------------------------------------------
# ROUTE PAR DEFAUT
# --------------------------------------------------
        
        //PATTERN:/
        //CTRL:postsController
        //ACTION:indexAction

      else:
        include_once '../app/controllers/postsController.php';
        PostsController\indexAction($conn);
        
      endif;