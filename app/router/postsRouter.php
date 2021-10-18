<?php 

/*
../app/router/postsRouter.php
*/
use \App\Controllers\PostsController;
include_once '../app/controllers/postsController.php';


switch ($_GET['post']):
        

# --------------------------------------------------
# ROUTE DU DETAIL D'UN POST
# --------------------------------------------------
        //PATTERN:/
        //CTRL:postsController
        //ACTION:showAction
case "show":
PostsController\showAction($conn,$_GET['id']);
break;
# --------------------------------------------------
# ROUTE DU FORMULAIRE D'AJOUT D'UN POST
# --------------------------------------------------
        //PATTERN:/?posts=addForm
        //CTRL:postsController
        //ACTION:addFormAction
case "addForm":
PostsController\addFormAction($conn);
break;
# --------------------------------------------------
# ROUTE DE L'AJOUT D'UN POST
# --------------------------------------------------
        //PATTERN:/?posts=addInsert
        //CTRL:postsController
        //ACTION:addAction
case "addInsert":
        PostsController\addAction($conn);
        
break;
# --------------------------------------------------
# ROUTE DU FORMULAIRE D'EDITION D'UN POST
# --------------------------------------------------
case "editForm":
        PostsController\editFormAction($conn,$_GET['id']);
       
        
break;
# --------------------------------------------------
# ROUTE  D'EDITION D'UN POST
# --------------------------------------------------
case "update":
        PostsController\updateAction($conn,$_GET['id'],$_POST);
        
break;
endswitch;