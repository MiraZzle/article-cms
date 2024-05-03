<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'models/singleArticleModel.php';
require_once 'utilities.php';

class CreationController
{
    private $singleArticleModel;

    public function __construct()
    {
        global $mysqli;
        $this->singleArticleModel = new SingleArticleModel($mysqli);
    }

    public function createArticle()
    {
        $articleName = $this->getNewArticleName();

        // check for length of article name
        if (strlen($articleName) > MAX_ARTICLE_NAME_LENGTH) {
            $errorMessage = "Article name length has to be <= " . MAX_ARTICLE_NAME_LENGTH . "characters!";
            echo ($errorMessage);
        } else {
            $id = $this->singleArticleModel->createArticle($articleName); // receive new article id
            header("Location: /~" . CURRENT_USER_BLOG_ID . "/cms/article-edit/" . $id); // route to new article edit page
            exit;
        }
    }

    private function getNewArticleName()
    {
        return $_POST['articleName'] ?? '';
    }
}
