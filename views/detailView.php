<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ArticleDetailView
{
    public function showArticleDetail($article)
    {
        require_once 'templates/articleDetail.php';
    }
}
