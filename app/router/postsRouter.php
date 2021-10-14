<?php 




use \App\Controllers\PostsController;
include_once '../app/controllers/postsController.php';


switch ($_GET['posts']):
case "show":
# --------------------------------------------------
# ROUTE DU DETAIL D'UN POST
# --------------------------------------------------
        //PATTERN:/
        //CTRL:postsController
        //ACTION:showAction

PostsController\showAction($conn,$_GET['id']);
break;
# --------------------------------------------------
# ROUTE DU FORMULAIRE D'UN POST
# --------------------------------------------------

endswitch;