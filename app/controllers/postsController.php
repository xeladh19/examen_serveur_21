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
/**
 * Affichage des posts
 *
 * @param \PDO $conn
 * @return void
 */
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
/**
 * Détail d'un post
 *
 * @param \PDO $conn
 * @param integer $id
 * @return void
 */
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
/**
 * Formulaire d'ajout d'un post
 *
 * @param \PDO $conn
 * @return void
 */
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
/**
 * Ajout d'un post
 *
 * @param \PDO $conn
 * @return void
 */
function addAction(\PDO $conn){
    include_once '../app/models/postsModel.php';
    PostsModel\insert($conn,$_POST);
    header('location: ' . BASE_URL);
   
}
# --------------------------------------------------
# FORMULAIRE DE L'EDITION D'UN POST
# --------------------------------------------------
/**
 * Formulaire d'edition d'un post
 *
 * @param \PDO $conn
 * @param integer $id
 * @return void
 */
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
/**
 * Update d'un post
 *
 * @param \PDO $conn
 * @param integer $id
 * @param array $data
 * @return void
 */
function updateAction(\PDO $conn,int $id,array $data){
    // Je demande au model d'updater le post
    include_once '../app/models/postsModel.php';
    PostsModel\updateOneById($conn,$id,$data);
    // Je redirige vers le détail du  post
    header('location: ' . BASE_URL .'posts/'. $id . '/' .\Core\Functions\slugify($_POST['title']) . '.html');
    
}
# --------------------------------------------------
# SUPPRESSION D'UN POST
# --------------------------------------------------

function deleteAction(\PDO $conn, int $id) {
    include_once '../app/models/postsModel.php';
      $reponse = postsModel\deleteOneById($conn,$id);
     
      if($reponse == 1):
        header('location: ' . BASE_URL);
      else:
        GLOBAL $content;
        $content = "<h1>Erreur la page n'a pas pu être affichée</h1>
                    <div>
                    <a href=. BASE_URL . > Retour </a>
                    </div>";
      endif;
}
