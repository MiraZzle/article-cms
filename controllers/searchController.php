<?php

require_once 'models/articlesModel.php';
require_once 'views/queryView.php';
require_once 'utilities.php';

class SearchController
{
    private $articlesModel;
    private $articleQueryView;

    public function __construct()
    {
        global $mysqli;
        $this->articlesModel = new ArticlesModel($mysqli);
        $this->articleQueryView = new ArticleQueryView();
    }

    public function queryArticles()
    {
        $searchQuery = $this->getQuery();

        $matchedArticles = $this->articlesModel->getArticlesFromSearch($searchQuery);
        $this->articleQueryView->showMatchingArticles($matchedArticles, $searchQuery);
    }

    private function getQuery()
    {
        return $_POST['query'] ?? "";
    }
}
