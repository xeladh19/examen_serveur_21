<?php 
/*
../app/controllers/postsController.php
*/

/*----------------------------------------------------------------*/
namespace App\Controllers\PostsController;
use \App\Models\PostsModel;
/*----------------------------------------------------------------*/

# --------------------------------------------------
#  AFFICHAGE DES 10 DERNIERS POSTS
# --------------------------------------------------

function indexAction(\PDO $conn){
    include_once '../app/models/postsModel.php';
    $posts = PostsModel\findAll($conn);

    GLOBAL $content,$zoneTitle;
    $title = "blog";
    ob_start();
    include '../app/views/posts/index.php';
    $content = ob_get_clean();

}
# --------------------------------------------------
# DETAIL D'UN POST
# --------------------------------------------------
function showAction(\PDO $conn, int $id){
    include_once '../app/models/postsModel.php';
    $post = PostsModel\findOneById($conn,$id);
    GLOBAL $content,$zoneTitle;
    $zoneTitle = $post['title'];
    ob_start();
    include '../app/views/posts/show.php';
    $content = ob_get_clean();


}
# --------------------------------------------------
# FORMULAIRE D'AJOUT D'UN POST
# --------------------------------------------------
function addFormAction(\PDO $conn){
    GLOBAL $content,$zoneTitle;
    $zoneTitle = "Add a post";
    ob_start();
    include '../app/views/posts/addForm.php';
    $content = ob_get_clean();
    
}
# --------------------------------------------------
# AJOUT D'UN POST
# --------------------------------------------------
function addAction(\PDO $conn){
    include_once '../app/models/postsModel.php';
    PostsModel\insert($conn,$_POST);
    header('location: ' . BASE_URL);
   
}
# --------------------------------------------------
# FORMULAIRE DE L'EDITION D'UN POST
# --------------------------------------------------

function editFormAction(\PDO $conn, int $id){
    include '../app/models/postsModel.php';
    $post = PostsModel\findOneById($conn,$id);
    GLOBAL $content,$zoneTitle;
    $title = "Edit a post";
    ob_start();
    include '../app/views/posts/editForm.php';
    $content = ob_get_clean();
}
# --------------------------------------------------
# UPDATE D'UN POST
# --------------------------------------------------
function updateAction(\PDO $conn,int $id,array $data){
    // Je demande au modèle d'updater le post
    include '../app/models/postsModel.php';
    PostsModel\updateOneById($conn,$id,$_POST);
    // Je redirige vers le détail du  post
    header('location: ' . BASE_URL);
}