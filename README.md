# Article CMS

## Project Description
This project aims to develop a simple web application in PHP and JavaScript for editing and displaying articles. The project served as my final project for my university course [Programming of Web Applications](https://webik.ms.mff.cuni.cz/nswi142/). 

## Basic Database Schema
The database schema includes a table named articles, with the following columns:

- `id (INT)`: Auto-incrementing primary key.
- `name (VARCHAR)`: Name of the article, limited to 128 characters.
- `content (TEXT)`: Content of the article.
``` SQL
CREATE DATABASE IF NOT EXISTS articles;

USE articles;

CREATE TABLE IF NOT EXISTS articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(128),
    content TEXT
);
```

## Configuring the Database
To configure the database connection, create a file named `db_config.php` with the following PHP code:

`````` php
<?php
$db_config = [
    'server'   => 'your_database_server',
    'login'    => 'your_database_username',
    'password' => 'your_database_password',
    'database' => 'your_database_name',
];
``````

Replace `your_database_server`, `your_database_username`, `your_database_password`, and `your_database_name` with your actual database server address, username, password, and database name respectively.

## Note
Ensure that the database configuration file (`db_config.php`) is properly set up and included in your project directory for successful database connection.

## Deployed version
The project is deployed at an Apache server called [Webik](https://webik.ms.mff.cuni.cz/nswi142/2021-2022/)