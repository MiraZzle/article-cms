<html>

<head>
    <title>Article list</title>
    <link rel="stylesheet" href="/~<?php echo CURRENT_USER_BLOG_ID ?>/cms/public/styles/styles.css">
</head>

<body>
    <div class="container-lg">
        <h1>Article list</h1>
        <form action=<?= '/~' . CURRENT_USER_BLOG_ID . "/cms/search/" ?> method="post">
            <div class="form-input-container">
                <label for="search-query">Search query: </label>
                <input type="text" id="search-query" name="query" placeholder="Your search query" required />
            </div>
            <button type="submit" id="search-button">Search</button>
        </form>

        <hr>
        <ul id="article-item-list">
            <?php
            // create ALL article-list-rows with appropriate buttons linked up 
            foreach ($articles as $article) {
                echo (
                    '<li id="article-' . htmlspecialchars($article['id']) .
                    '">' .
                    htmlspecialchars($article['name']) .
                    '<div class="article-list-row">' .
                    '<a class="link-blue" href="./article/' . htmlspecialchars($article['id']) . '">Show</a>' .
                    '<a class="link-blue" href="./article-edit/' . htmlspecialchars($article['id']) . '">Edit</a>' .
                    '<a class="link-red delete-article-link" href="#">Delete</a>' .
                    '</div>' .
                    '</li>'
                );
            }
            ?>
        </ul>
        <hr>

        <!-- entire page controls -->
        <div class="article-list-controls">
            <div id="paging-buttons">
                <button id="previous-button">Previous</button>
                <button id="next-button">Next</button>
                <p id="page-count-display">Page count </p>
            </div>
            <button id="create-article-button">Create article</button>
        </div>

        <!-- create article popup !!! hidden by default !!! -->
        <div id="create-article-container" class="hidden">
            <div class="create-article-card">
                <form action=<?= '/~' . CURRENT_USER_BLOG_ID . "/cms/article-create/" ?> method="post">
                    <div class="form-input-container">
                        <label for="article-name">Article name</label>
                        <input type="text" id="article-name" maxlength=<?= MAX_ARTICLE_NAME_LENGTH ?> name="articleName" placeholder="Name of the article" required />
                    </div>
                    <div class="dialog-buttons">
                        <button type="submit" id="create">Create</button>
                        <button type="button" id="back-button">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src=<?= '/~' . CURRENT_USER_BLOG_ID . '/cms/public/scripts/deleteArticleFromList.js' ?>></script>
    <script src=<?= '/~' . CURRENT_USER_BLOG_ID . '/cms/public/scripts/articleListPaging.js' ?>></script>
    <script src=<?= '/~' . CURRENT_USER_BLOG_ID . '/cms/public/scripts/articleCreator.js' ?>></script>
    <script src=<?= '/~' . CURRENT_USER_BLOG_ID . '/cms/public/scripts/pagingButtons.js' ?>></script>

</body>

</html>