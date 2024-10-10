<?php
include 'data.php';
include 'functions.php';

$category_id = isset($_GET['category_id']) ? (int)$_GET['category_id'] : 0;

$filteredArticles = $category_id ? filterArticlesByCategory($articles, $category_id) : $articles;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artigos Filtrados - Aplicativo de Notícias</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<nav class="navbar">
    <h6>Artigos Filtrados - Aplicativo de Notícias</h6>
    <ul>
        <li><a href="list.php">Todos os Artigos</a></li>
        <?php foreach ($categories as $category): ?>
            <li><a href="filter.php?category_id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <form action="search.php" method="GET" class="search-form">
        <input type="text" name="q" placeholder="Buscar artigos...">
        <button type="submit">Buscar</button>
    </form>
</nav>
<div id="content">
    <?php listArticles($filteredArticles, $categories); ?>
</div>
</body>
</html>
