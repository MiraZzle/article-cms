<?php

// set error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'router.php';
require_once 'db_config.php';
require_once 'utilities.php';

$router = new Router();

// setup specific routes
$router->addRoute('', 'ListController', 'displayDefault');
$router->addRoute('articles', 'ListController', 'displayArticleList');
$router->addRoute('article', 'DetailController', 'displayArticleDetail');
$router->addRoute('article-edit', 'EditController', 'editArticle');
$router->addRoute('article-update', 'UpdateController', 'updateArticle');
$router->addRoute('article-delete', 'DeletionController', 'deleteArticle');
$router->addRoute('article-create', 'CreationController', 'createArticle');
$router->addRoute('search', 'SearchController', 'queryArticles');

$mysqli = new mysqli($db_config['server'], $db_config['login'], $db_config['password'], $db_config['database']);

$url = $_SERVER['REQUEST_URI'];
$parsedURL = parseGivenURL($url);

$urlRoute = $router->route($parsedURL);

$router->dispatch($urlRoute);

$mysqli->close();
