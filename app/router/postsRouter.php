<?php 

/*
../app/router/postsRouter.php
*/
use \App\Controllers\PostsController;
include_once '../app/controllers/postsController.php';


switch ($_GET['post']):
        
// DETAIL D'UN POST
          // PATTERN: index?posts=show&id=x
          // CTRL: postsControleur
          // ACTION: show
        case "show":
        PostsController\showAction($conn, $_GET['id']);    
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
        if(!empty($_FILES)){
                $img = $_FILES['img'];
                //Vérification du format d'extension de l'image 
                $ext = strtolower (substr($image['name'],-3));
                $allow_ext = array ("jpg",'png','gif');
                //On veut que l'extension soit dans le tableau allow_text, ce qui permet de vérifier rapidement et de changer si on veut des extensions en plus ou pas.  
                if(in_array($ext,$allow_ext)){

                //Le premier paramètre on lui indique le fichier à bouger et le deuxième paramètre l'endroit où on veut déplacer ce fichier. 
                move_uploaded_file($img['tmp_name'],"./images/blog/".$img['name']);
                }
                else { 
                        $image ="1.jpg";    
                }
        }
        PostsController\addAction($conn, [
                "title" => $_POST['title'],
                "text" => $_POST['text'],
                "image" => $image,
                "quote" => $_POST['quote'],
                "category_id" => $_POST['category_id']
            ]);
    
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
# --------------------------------------------------
# ROUTE  DE SUPPRESION D'UN POST
# --------------------------------------------------
        //PATTERN:/?post=delete&id=x
        //CTRL:postsController
        //ACTION:deleteAction
case "delete":
        PostsController\deleteAction($conn,$_GET['id']);
break;
endswitch;