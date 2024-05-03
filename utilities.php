<?php

define("MAX_ARTICLE_NAME_LENGTH", 32);
define("MAX_ARTICLE_CONTENT_LENGTH", 1024);
define("CURRENT_USER_BLOG_ID", 77627320);

// change made here!
function parseGivenURL($url)
{
    $urlParts = explode('/cms/', $url, 2);
    $requestPart = isset($urlParts[1]) ? $urlParts[1] : '';

    $sanitizedRequestPart = explode('?', $requestPart, 2)[0]; // get rid of query parameters

    return $sanitizedRequestPart;
}

// returns text where all occurences of pattern are replaced with <em> tag
function getHighlightedStringOccurences($originalText, $pattern)
{
    $highlightedOccurence = '<span>' . $pattern . '</span>';
    $highlightedText = str_replace($pattern, $highlightedOccurence, $originalText);

    return $highlightedText;
}
