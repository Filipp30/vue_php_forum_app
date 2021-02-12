<?php


class ForumController{

    function get_all_articles(){
        echo json_encode('controller ->model!');
        $model = new Model\ForumModel();
        $result = $model->get_all_articles();
        echo json_encode($result);
        exit;
    }


}