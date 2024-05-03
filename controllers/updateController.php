<?php

require_once 'models/singleArticleModel.php';
require_once 'utilities.php';

class UpdateController
{
    private $singleArticleModel;

    public function __construct()
    {
        global $mysqli;
        $this->singleArticleModel = new SingleArticleModel($mysqli);
    }

    public function updateArticle($id)
    {
        $updatedName = $this->getUpdatedName();
        $updatedContent = $this->getUpdatedContent();

        // check for name and content length constraints 
        if (strlen($updatedName) > MAX_ARTICLE_NAME_LENGTH || strlen($updatedContent) > MAX_ARTICLE_CONTENT_LENGTH) {
            $errorMessage = "Article name has to <= " . MAX_ARTICLE_NAME_LENGTH . " long and content has to be <= " . MAX_ARTICLE_CONTENT_LENGTH . " characters long!";
            echo ($errorMessage);
        } else {
            $this->singleArticleModel->updateArticle($id, $updatedName, $updatedContent);
            header("Location: /~" . CURRENT_USER_BLOG_ID . "/cms/articles");
            exit;
        }
    }

    private function getUpdatedName()
    {
        return $_POST['articleName'] ?? "";
    }

    private function getUpdatedContent()
    {
        return $_POST['articleContent'] ?? "";
    }
}
