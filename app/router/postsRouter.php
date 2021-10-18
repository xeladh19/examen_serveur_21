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
        //PATTERN:/?post=addForm
        //CTRL:postsController
        //ACTION:addFormAction
case "addForm":
        PostsController\addFormAction($conn);
break;
# --------------------------------------------------
# ROUTE DE L'AJOUT D'UN POST
# --------------------------------------------------
        //PATTERN:/?post=addInsert
        //CTRL:postsController
        //ACTION:addAction
case "addInsert":
        PostsController\addAction($conn);
        
break;
# --------------------------------------------------
# ROUTE DU FORMULAIRE D'EDITION D'UN POST
# --------------------------------------------------
        //PATTERN:/?post=editForm&id=x
        //CTRL:postsController
        //ACTION:editFormAction
case "editForm":
        PostsController\editFormAction($conn,$_GET['id']); 
break;
# --------------------------------------------------
# ROUTE  D'EDITION D'UN POST
# --------------------------------------------------
        //PATTERN:/?post=update&id=x
        //CTRL:postsController
        //ACTION:updateAction
case "update":
        PostsController\updateAction($conn,$_GET['id'],$_POST);
        
        
break;
case "delete":
        PostsController\deleteAction($conn,$_GET['id']);
break;
endswitch;