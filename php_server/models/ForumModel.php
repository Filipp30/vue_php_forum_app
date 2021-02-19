<?php

namespace Model;
use DbConnection\DbConnection;
use PDO;
class ForumModel{


    function get_all_articles(){
        $db_connection = new DbConnection();
        $pdo = $db_connection->get_db();
        $sql = "SELECT forum_articles.id,
        forum_articles.title,forum_articles.author,forum_articles.theme,forum_articles.date_time_create,
        forum_articles.description,forum_articles.date_time_update,
        count(article_comment.article_id) as comments_count
        FROM
        forum_articles LEFT JOIN article_comment on forum_articles.id = article_comment.article_id
        GROUP BY forum_articles.id,
        forum_articles.title,forum_articles.author,forum_articles.theme,forum_articles.date_time_create";
        $query=$pdo->prepare($sql);
        $query->execute();
        return $result= $query->fetchAll(PDO::FETCH_OBJ);
    }
    function add_new_article($title,$author,$id_user,$description,$theme){
        $db_connection = new DbConnection();
        $pdo = $db_connection->get_db();
        $sql = "INSERT INTO forum_articles
        (`title`,`author`,`id_author`,`description`,`theme`)
        VALUES (?,?,?,?,?)";
        $query=$pdo->prepare($sql);
        return $result = $query->execute(
            [$title,$author,$id_user,$description,$theme]);
    }
    function get_comments($article_id){
        $db_connection = new DbConnection();
        $pdo = $db_connection->get_db();
        $sql = "SELECT article_comment.author,article_comment.comment,article_comment.date_time 
                FROM article_comment
                INNER JOIN forum_articles 
                ON forum_articles.id = article_comment.article_id
                WHERE forum_articles.id = ?";
        $query=$pdo->prepare($sql);
        $query->bindParam(1,$article_id,PDO::PARAM_INT);
        $query->execute();
        return $result = $query->fetchAll(PDO::FETCH_OBJ);
    }
    function add_comment($user_id,$author,$article_id,$comment){
        $db_connection = new DbConnection();
        $pdo = $db_connection->get_db();
        $sql = "INSERT INTO article_comment (user_id,author,article_id,comment) VALUES (?,?,?,?)";
        $query=$pdo->prepare($sql);
        $query->bindParam(1,$user_id,PDO::PARAM_INT);
        $query->bindParam(2,$author,PDO::PARAM_STR);
        $query->bindParam(3,$article_id,PDO::PARAM_INT);
        $query->bindParam(4,$comment,PDO::PARAM_STR);
        return $result = $query->execute();
    }
}