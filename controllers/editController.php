<?php

require_once 'models/singleArticleModel.php';
require_once 'views/editView.php';
require_once 'utilities.php';
class EditController
{
    private $singleArticleModel;
    private $articleEditView;

    public function __construct()
    {
        global $mysqli;
        $this->articleEditView = new ArticleEditView();
        $this->singleArticleModel = new SingleArticleModel($mysqli);
    }

    public function editArticle($id)
    {
        $articleData = $this->singleArticleModel->getArticleData($id); // row record of article
        if ($articleData === null) {
            http_response_code(404);
            echo ("404 Not Found");
        } else {
            $this->articleEditView->showArticleEdit($articleData);
        }
    }
}
