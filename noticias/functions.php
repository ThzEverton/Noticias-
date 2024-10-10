<?php
// functions.php

function listArticles($articles, $categories) {
    foreach ($articles as $article) {
        $categoryName = '';
        foreach ($categories as $category) {
            if ($category['id'] == $article['category_id']) {
                $categoryName = $category['name'];
                break;
            }
        }
        echo "<h2>{$article['title']}</h2>";
        echo "<p>{$article['content']}</p>";
        echo "<p>Category: {$categoryName}</p>";
        echo "<p>Published on: {$article['created_at']}</p>";
        echo "<hr>";
    }
}

function filterArticlesByCategory($articles, $category_id) {
    return array_filter($articles, function($article) use ($category_id) {
        return $article['category_id'] == $category_id;
    });
}

function searchArticles($articles, $query) {
    return array_filter($articles, function($article) use ($query) {
        return stripos($article['title'], $query) !== false || stripos($article['content'], $query) !== false;
    });
}

function addCategory(&$categories, $name) {
    $id = count($categories) + 1;
    $categories[] = ['id' => $id, 'name' => $name];
    $_SESSION['categories'] = $categories;
}

function addArticle(&$articles, $title, $content, $category_id, $created_at) {
    $id = count($articles) + 1;
    $articles[] = ['id' => $id, 'title' => $title, 'content' => $content, 'category_id' => $category_id, 'created_at' => $created_at];
    $_SESSION['articles'] = $articles;
}
?>