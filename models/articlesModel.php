<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./db_config.php');

class ArticlesModel
{
    private $mysqli;

    public function __construct($constructedMysqli)
    {
        $this->mysqli = $constructedMysqli;
    }

    // get associative article data
    public function getArticles()
    {
        try {
            $query = 'SELECT * FROM articles';
            $data = $this->mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo ("Database Error: " . $e->getMessage());
            return [];
        }
    }

    // get associative article data for article that match user query
    public function getArticlesFromSearch($searchedString)
    {
        try {
            $query = "SELECT * FROM articles 
                  WHERE content LIKE ? OR name LIKE ?
                  ORDER BY CASE 
                             WHEN name LIKE ? THEN 1  -- articles where name matches come first
                             ELSE 2 
                           END";

            $searchedStringContent = '%' . $searchedString . '%';
            $searchedStringName = '%' . $searchedString . '%';

            $statement = $this->mysqli->prepare($query);
            $statement->bind_param("sss", $searchedStringContent, $searchedStringName, $searchedStringName);

            $statement->execute();
            $result = $statement->get_result();

            $data = $result->fetch_all(MYSQLI_ASSOC);
            $statement->close();

            return $data;
        } catch (PDOException $e) {
            echo ("Database Error: " . $e->getMessage());
            return [];
        }
    }
}
