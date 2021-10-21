<?php 
/*
    ./app/controllers/categoriesController.php
 */

namespace App\Controllers\CategoriesController;
use \App\Models\CategoriesModel;
use App\Models\PostsModel;

/**
 * Undocumented function
 *
 * @param \PDO $conn
 * @return void
 */
function indexAction(\PDO $conn) {
    include_once '../app/models/categoriesModel.php';
    $categories = CategoriesModel\findAll($conn);
    
    include_once '../app/models/postsModel.php';
    $nbrPosts = PostsModel\findNumberOfPostsByCategorie($conn);
    include '../app/views/categories/index.php';
}

