<?php


class forumController{

    function get_all_articles($data=null){
        $model = new Model\ForumModel();
        $result = $model->get_all_articles();
        echo json_encode($result);
        exit;
    }


}