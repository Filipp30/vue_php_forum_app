<?php


class forumController{

    function get_all_articles($data=null){
        $model = new Model\ForumModel();
        $result = $model->get_all_articles();
        echo json_encode($result);
        exit;
    }
    function add_new_article($data){
        $id_user = 333;
        $model = new Model\ForumModel();
        $result = $model->add_new_article(
            $data->title,$data->author,$id_user,$data->description,$data->theme);
        echo json_encode($result);
        exit;
    }


}