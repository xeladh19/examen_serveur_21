<?php 
/*
    ./app/models/categoriesModel.php
 */

 namespace App\Models\CategoriesModel;

/**
 * Undocumented function
 *
 * @param \PDO $conn
 * @param integer $limit
 * @return void
 */
 function findAll(\PDO $conn):array{
     $sql = "SELECT * 
             FROM categories
             ORDER BY name ASC;";
            
    $rs = $conn->query($sql);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
 }


