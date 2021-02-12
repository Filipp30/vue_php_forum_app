<?php

namespace Model;
use DbConnection\DbConnection;
use PDO;
class forumModel{

//    function add_article($title,$author,$description,$date_time_create,$thema,){
//        $db_connection = new DbConnection();
//        $pdo = $db_connection->get_db();
//        $sql = "INSERT INTO forum_articles
//        (title,author,description,date_time_create,theme)
//        VALUES (?,?,?,?,?)";
//        $query=$pdo->prepare($sql);
//        return $result = $query->execute(
//            [$title,$author,$description,$date_time_create,$thema]);
//    }
    public function get_all_articles(){
        $db_connection = new DbConnection();
        $pdo = $db_connection->get_db();
        $sql = "SELECT * FROM forum_articles";
        $query=$pdo->prepare($sql);
        $query->execute();
        return $result= $query->fetchAll(PDO::FETCH_OBJ);
    }
}