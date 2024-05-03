<html>

<head>
    <title>Article search</title>
    <link rel="stylesheet" href="/~<?php echo CURRENT_USER_BLOG_ID ?>/cms/public/styles/styles.css">
</head>

<body>
    <div class="container-lg">
        <h1>Article search for: <?php echo htmlspecialchars($usedQuery) ?></h1>
        <hr>
        <ul id="article-item-list">
            <?php
            // create ALL article-list-rows with appropriate buttons linked up 
            foreach ($articles as $article) {
                echo (
                    '<li id="article-' . htmlspecialchars($article['id']) .
                    '">' .
                    '<div>' .
                    getHighlightedStringOccurences(htmlspecialchars($article['name']), htmlspecialchars($usedQuery)) .
                    '</div>' .
                    '<div class="article-list-row">' .
                    '<a class="link-blue" href="/~' . CURRENT_USER_BLOG_ID . '/cms/article/' . htmlspecialchars($article['id']) . "?search=" . htmlspecialchars($usedQuery) .  '"> Show </a>' .
                    '</div>' .
                    '</li>' .
                    '<p class="article-list-content-para">' .
                    getHighlightedStringOccurences(htmlspecialchars($article['content']), htmlspecialchars($usedQuery)) .
                    '</p>'
                );
            }
            ?>
        </ul>
        <hr>
        <div class="article-list-controls">
            <a class="button-style-link" href=<?= '/~' . CURRENT_USER_BLOG_ID . '/cms/articles'; ?>> Back to articles</a>
        </div>
    </div>

</body>

</html>