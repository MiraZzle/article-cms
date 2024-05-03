<html>

<head>
    <title>Article edit</title>
    <link rel="stylesheet" href=<?= '/~' . CURRENT_USER_BLOG_ID . '/cms/public/styles/styles.css'; ?>>
</head>

<body>
    <div class="container-md">
        <h1>
            Edit article
        </h1>
        <form action=<?= '/~' . CURRENT_USER_BLOG_ID . "/cms/article-update/" . htmlspecialchars($article['id']) ?> method="post">
            <div class="form-input-container">
                <label for="article-name">Name</label>
                <input id="article-name" name="articleName" type="text" maxlength=<?= MAX_ARTICLE_NAME_LENGTH ?> required value="<?= htmlspecialchars($article['name']) ?>">
            </div>

            <div class="form-input-container">
                <label for="article-content">Content</label>
                <textarea id="article-content" name="articleContent" maxlength=<?= MAX_ARTICLE_CONTENT_LENGTH ?>><?= htmlspecialchars($article['content']) ?></textarea>
            </div>

            <div class="button-container">
                <button id="save-button" class="button-green" type="submit">Save</button>
                <a class="button-red button-style-link" href=<?= '/~' . CURRENT_USER_BLOG_ID . '/cms/articles'; ?>> Back to articles</a>
            </div>
        </form>
    </div>

    <script src=<?= '/~' . CURRENT_USER_BLOG_ID . '/cms/public/scripts/articleEditSaveButton.js' ?>></script>
</body>

</html>