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
    $sql = "SELECT * 
            FROM posts
            ORDER BY created_at DESC
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
function findOneById(\PDO $conn, int $id):array{
    $sql = "SELECT * 
            FROM posts 
            WHERE id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id',$id,\PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
    
}
# --------------------------------------------------
# AJOUT D'UN POST
# --------------------------------------------------

function insert(\PDO $conn, array $data) :int{
    $sql = "INSERT INTO posts 
            SET title = :title,
                text = :text,
                created_at =  NOW(),
                quote = :quote,
                user = 1;";
            $rs = $conn->prepare($sql);
            $rs->bindValue(':title',$data['title'],\PDO::PARAM_STR);
            $rs->bindValue(':text',$data['text'],\PDO::PARAM_STR);
            $rs->bindValue(':quote',$data['quote'],\PDO::PARAM_STR);
             $rs->execute();        
            return $conn->lastInsertId();
            
            
}

// function editOneById(\PDO $conn, int $id){
//     $sql = "SELECT * 
//             FROM posts 
//             WHERE id = :id;";
//             $rs = $conn->prepare($sql);
//             $rs->bindValue(':id',$id,\PDO::PARAM_INT);
//             $rs->execute();
//             return $rs->fetch(\PDO::FETCH_ASSOC);
    
// }



function updateOneById(\PDO $conn, int $id,array $data ){
            $sql = "UPDATE `posts` 
                    SET title = :title,
                        text = :text,
                        created_at =  NOW(),
                        quote = :quote,
                        user = 1
                    WHERE id = :id;";
            $rs = $conn->prepare($sql);
            $rs->bindValue(':id',$id,\PDO::PARAM_INT);
            $rs->bindValue(':title',$data['title'],\PDO::PARAM_STR);
            $rs->bindValue(':text',$data['text'],\PDO::PARAM_STR);
            $rs->bindValue(':quote',$data['quote'],\PDO::PARAM_STR);    
            return $rs->execute();
}