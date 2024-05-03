<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ArticleQueryView
{
    public function showMatchingArticles($articles, $usedQuery)
    {
        require_once 'templates/articleSearch.php';
    }
}
