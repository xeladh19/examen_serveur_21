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

function showAction(\PDO $conn, int $id){
    include_once '../app/models/postsModel.php';
    $post = PostsModel\findOneById($conn,$id);
    GLOBAL $content,$zoneTitle;
    $zoneTitle = $post['title'];
    ob_start();
    include '../app/views/posts/show.php';
    $content = ob_get_clean();


}