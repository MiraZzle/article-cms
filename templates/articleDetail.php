<html>

<head>
    <title>Article detail</title>
    <link rel="stylesheet" href=<?= '/~' . CURRENT_USER_BLOG_ID . '/cms/public/styles/styles.css'; ?>>
</head>

<body>
    <div class="container-md">
        <h1>
            <?php
            // check if query parameter 'search' exists
            // if it does exist, echo:                     
            if (isset($_GET['search'])) {
                $search = htmlspecialchars($_GET['search']);
                // echo highlighted article name
                echo getHighlightedStringOccurences(htmlspecialchars($article['name']), $search);
            } else {
                echo htmlspecialchars($article['name']);
            }
            ?>
        </h1>

        <p id="article-content">
            <?php
            // check if query parameter 'search' exists
            // if it does exist, echo:                     
            if (isset($_GET['search'])) {
                $search = htmlspecialchars($_GET['search']);
                // echo highlighted article content
                echo getHighlightedStringOccurences(htmlspecialchars($article['content']), $search);
            } else {
                echo htmlspecialchars($article['content']);
            }
            ?>
        </p>

        <div class="button-container">
            <a class="button-style-link button-blue" href=<?= '/~' . CURRENT_USER_BLOG_ID . '/cms/article-edit/' . htmlspecialchars($article['id']); ?>>Edit</a>

            <a class="button-style-link" href=<?= '/~' . CURRENT_USER_BLOG_ID . '/cms/articles'; ?>> Back to articles</a>
        </div>
    </div>
</body>

</html>