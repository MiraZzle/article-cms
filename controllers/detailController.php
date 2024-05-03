<?php

require_once 'models/singleArticleModel.php';
require_once 'views/detailView.php';
require_once 'utilities.php';

class DetailController
{
    private $singleArticleModel;
    private $articleDetailView;

    public function __construct()
    {
        global $mysqli;
        $this->articleDetailView = new ArticleDetailView();
        $this->singleArticleModel = new SingleArticleModel($mysqli);
    }

    public function displayArticleDetail($id)
    {
        $articleData = $this->singleArticleModel->getArticleData($id); // row record of article
        if ($articleData === null) {
            http_response_code(404);
            echo ("404 Not Found");
        } else {
            $this->articleDetailView->showArticleDetail($articleData);
        }
    }
}
