<?php
include 'data.php';
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novos - Artigos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<nav class="navbar">
    <h6>Artigos</h6>
    <ul>
        <li><a href="list.php">Listar Todas Categorias</a></li>
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
    <?php listArticles($articles, $categories); ?>
</div>
<form action="teste.php" method="get">
    <button type="submit">Página Inicial</button>
</form>
</body>
</html>
