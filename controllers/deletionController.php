<?php

require_once 'models/singleArticleModel.php';
require_once 'utilities.php';

class DeletionController
{
    private $singleArticleModel;

    public function __construct()
    {
        global $mysqli;
        $this->singleArticleModel = new SingleArticleModel($mysqli);
    }

    public function deleteArticle($id)
    {
        $deleted = $this->singleArticleModel->deleteArticle($id); // status of article deletion

        if ($deleted) {
            echo "Article with id " . $id . " was deleted successfully";
        } else {
            echo "Unsucessful deletion of article with id " . $id;
        }
    }
}
