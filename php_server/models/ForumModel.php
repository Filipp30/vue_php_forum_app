<?php

namespace Model;
use DbConnection\DbConnection;
use PDO;
class ForumModel{


    public function get_all_articles(){
        $db_connection = new DbConnection();
        $pdo = $db_connection->get_db();
        $sql = "SELECT * FROM forum_articles";
        $query=$pdo->prepare($sql);
        $query->execute();
        return $result= $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function add_new_article($title,$author,$id_user,$description,$theme){
        $db_connection = new DbConnection();
        $pdo = $db_connection->get_db();
        $sql = "INSERT INTO forum_articles
        (`title`,`author`,`id_author`,`description`,`theme`,`comments_count`)
        VALUES (?,?,?,?,?,?)";
        $query=$pdo->prepare($sql);
        return $result = $query->execute(
            [$title,$author,$id_user,$description,$theme,333]);
    }
}