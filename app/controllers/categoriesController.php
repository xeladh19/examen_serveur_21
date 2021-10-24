<?php 
/*
    ./app/controllers/categoriesController.php
 */

namespace App\Controllers\CategoriesController;
use \App\Models\CategoriesModel;
use App\Models\PostsModel;

/**
 * L'indexAction de la liste des catégories
 *
 * @param \PDO $conn
 * @return void
 */
function indexAction(\PDO $conn) {
    //Je vais placer dans $categories la liste des 10 derniers posts
    include_once '../app/models/categoriesModel.php';
    $categories = CategoriesModel\findAll($conn);
    //Je vais placer dans $nbrPosts le nombre de posts par catégorie
    include_once '../app/models/postsModel.php';
    $nbrPosts = PostsModel\findNumberOfPostsByCategorie($conn);
    //Je charge ensuite la vue index
    include '../app/views/categories/index.php';
}

