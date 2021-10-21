<?php 
/*
../app/models/postsModel.php
*/

namespace App\Models\PostsModel;


# --------------------------------------------------
#  AFFICHAGE DES 10 POSTS    
# --------------------------------------------------
/**
 * Affichage des 10 posts 
 *
 * @param \PDO $conn
 * @param integer $limit
 * @return void
 */
function findAll(\PDO $conn, int $limit = 10){
    $sql = "SELECT *, p.id as postId,
    c.id as categorieId,
    c.name as categorieName,
    p.created_at as postDate
    FROM posts p
    JOIN categories c on p.category_id = c.id
    ORDER BY p.created_at DESC 
    LIMIT :limit;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':limit',$limit,\PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}


  
# --------------------------------------------------
# DETAIL D'UN POST
# --------------------------------------------------
/**
 * Affichage du details d'un post
 *
 * @param \PDO $conn
 * @param integer $id
 * @return array
 */
// function findOneById(\PDO $conn, int $id):array{
//     $sql = "SELECT *, p.id as id,
//     c.id as categorieId,
//     c.name as categorieName,
//     p.created_at as postDate
//             FROM posts 
//             JOIN categories c on p.category_id = c.id
//             WHERE p.id = :id;";
//     $rs = $conn->prepare($sql);
//     $rs->bindValue(':id',$id,\PDO::PARAM_INT);
//     $rs->execute();
//     return $rs->fetch(\PDO::FETCH_ASSOC);
    
// }
// function findOneById(\PDO $connexion , int $id) :array {
//     $sql = "SELECT *, p.id as postId,
//     c.id as categorieId,
//     c.name as categorieName,
//     p.created_at as postDate
//     FROM posts p
// JOIN categories c on p.category_id = c.id
//     WHERE p.id = :id;";
  
//     $rs = $connexion->prepare($sql);
//     $rs->bindValue (':id', $id, \PDO::PARAM_INT);
//     $rs->execute();
//     return $rs->fetch(\PDO::FETCH_ASSOC);
//   }

  function findOneById(\PDO $conn ,int $id) :array {
      
    $sql = "SELECT
    *,
    p.id AS postId,
    c.id AS categorieId,
    c.name AS categorieName,
    p.created_at AS postDate 
FROM
    posts p 
JOIN
    categories c 
        ON p.category_id = c.id 
WHERE
    p.id = :id;";
  
    $rs = $conn->prepare($sql);
    $rs->bindValue (':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
  }
# --------------------------------------------------
# AJOUT D'UN POST
# --------------------------------------------------
/**
 * Ajout d'un post
 *
 * @param \PDO $conn
 * @param array $data
 * @return integer
 */
function insert(\PDO $conn, array $data) :int{
    $sql = "INSERT INTO posts 
            SET title = :title,
                text = :text,
                created_at =  NOW(),
                category_id = :category_id,
                quote = :quote;";
            $rs = $conn->prepare($sql);
            $rs->bindValue(':title',$data['title'],\PDO::PARAM_STR);
            $rs->bindValue(':text',$data['text'],\PDO::PARAM_STR);
            $rs->bindValue(':quote',$data['quote'],\PDO::PARAM_STR);
            $rs->bindValue(':category_id',$data['category_id'],\PDO::PARAM_INT);
            $rs->execute();    
  
            return $conn->lastInsertId();
            
            
            
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
function updateOneById(\PDO $conn, int $id, array $data ){
    
    $sql = "UPDATE `posts` 
            SET title = :title,
                text = :text,
                updated_at =  NOW(),
                category_id = :category_id,
                quote = :quote
            WHERE id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id',$id,\PDO::PARAM_INT);
    $rs->bindValue(':title',$data['title'],\PDO::PARAM_STR);
    $rs->bindValue(':text',$data['text'],\PDO::PARAM_STR);
    $rs->bindValue(':quote',$data['quote'],\PDO::PARAM_STR);   
    $rs->bindValue(':category_id',$data['category_id'],\PDO::PARAM_INT);
    return $rs->execute();
            
            
        
}

# --------------------------------------------------
# SUPPRESSION D'UN POST
# --------------------------------------------------

function deleteOneById(\PDO $conn,int $id){
    $sql = "DELETE FROM `posts`
            WHERE id = :id;";

            $rs = $conn->prepare($sql);
            $rs->bindValue(':id',$id,\PDO::PARAM_INT);
            return ($rs->execute())?1:0;
}

# --------------------------------------------------
# NOMBRE DE POSTS PAR CATEGORIE
# --------------------------------------------------
/**
 * [findNumberOfPostsByCategorie description]
 * @param  PDO    $connexion [description]
 * @return [type]            [description]
 */
function findNumberOfPostsByCategorie(\PDO $connexion) {
    $sql = "SELECT COUNT(id) AS nbrPostsByCategory, category_id
    FROM posts
    GROUP BY category_id;";
    $rs = $connexion -> query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
 }
 