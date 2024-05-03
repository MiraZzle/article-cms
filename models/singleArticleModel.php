<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./db_config.php');

class SingleArticleModel
{
    private $mysqli; // mysqli connection object

    public function __construct($constructedMysqli)
    {
        $this->mysqli = $constructedMysqli;
    }

    // return associative article data of a single article record
    public function getArticleData($id)
    {
        try {
            $article_query = "SELECT * FROM articles WHERE ID = ?;";
            $stmt = $this->mysqli->prepare($article_query);

            $stmt->bind_param("i", $id); // map correct type and parameter - prevents sql injection
            $stmt->execute();

            $result = $stmt->get_result();
            $associativeData = $result->fetch_assoc(); // get result row as associative array

            // set 404 error if article is not found
            if ($associativeData == null) {
                http_response_code(404);
                return;
            }
            return $associativeData;
        } catch (PDOException $e) {
            echo "Database Error: " . $e->getMessage();
            return [];
        }
    }

    // create new article and return id of newly created article
    public function createArticle($name)
    {
        try {
            $query = "INSERT INTO articles (name, content) VALUES (?, '')";
            $stmt = $this->mysqli->prepare($query);

            $stmt->bind_param("s", $name);
            if ($stmt->execute()) {
                $articleId = $this->mysqli->insert_id; // get new auto generated id
                echo "Insertion succesfull!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            return $articleId;
        } catch (PDOException $e) {
            echo "Database Error: " . $e->getMessage();
            return [];
        }
    }

    // delete article and return deletion success status 
    public function deleteArticle($id)
    {
        try {
            $query = "DELETE FROM articles WHERE id = ?";
            $stmt = $this->mysqli->prepare($query);

            $stmt->bind_param("i", $id);
            $result = $stmt->execute();

            $stmt->close();
            return $result;
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
            return [];
        }
    }

    public function updateArticle($id, $name, $content)
    {
        try {
            $query = "UPDATE articles SET name = ?, content = ? WHERE id = ?";
            $stmt = $this->mysqli->prepare($query);

            $stmt->bind_param("ssi", $name, $content, $id);
            if ($stmt->execute()) {
                echo "Article updated successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
            return [];
        }
    }
}
