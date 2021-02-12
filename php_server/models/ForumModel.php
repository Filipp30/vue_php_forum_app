<?php


namespace Model;
use DbConnection\DbConnection;
class ForumModel{

    function add_article($title,$author,$description,$date_time_create,$thema,){
        $db_connection = new DbConnection();
        $pdo = $db_connection->get_db();
        $sql = "INSERT INTO forum_articles
        (title,author,description,date_time_create,theme) 
        VALUES (?,?,?,?,?)";
        $query=$pdo->prepare($sql);
        return $result = $query->execute(
            [$title,$author,$description,$date_time_create,$thema]);
    }


}