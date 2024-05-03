<?php

require_once 'models/articlesModel.php';
require_once 'views/listView.php';
require_once 'utilities.php';

class ListController
{
    private $articlesModel;
    private $articleListView;

    public function __construct()
    {
        global $mysqli;
        $this->articlesModel = new ArticlesModel($mysqli);
        $this->articleListView = new ArticleListView();
    }

    function displayDefault() // on startup redirect to /articles
    {
        header("Location: /~" . CURRENT_USER_BLOG_ID . "/cms/articles");
        exit;
    }

    // display main page with list of article rows
    function displayArticleList()
    {
        $articlesData = $this->articlesModel->getArticles();
        $this->articleListView->showArticleList($articlesData);
    }
}
