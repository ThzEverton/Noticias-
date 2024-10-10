<?php
include 'data.php';
include 'functions.php';

$search_query = isset($_GET['q']) ? $_GET['q'] : '';

$searchResults = $search_query ? searchArticles($articles, $search_query) : [];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Busca - Aplicativo de Notícias</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<nav class="navbar">
    <h6>Resultados da Busca - Aplicativo de Notícias</h6>
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
    <?php listArticles($searchResults, $categories); ?>
</div>
</body>
</html>
