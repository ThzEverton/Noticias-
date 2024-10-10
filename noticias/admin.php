<?php
include 'data.php';
include 'functions.php';

// Processa o formulário de adição de categoria
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];
    addCategory($categories, $category_name);
}

// Processa o formulário de adição de artigo
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_article'])) {
    $article_title = $_POST['article_title'];
    $article_content = $_POST['article_content'];
    $category_id = (int)$_POST['category_id'];
    $created_at = date('Y-m-d H:i:s');
    addArticle($articles, $article_title, $article_content, $category_id, $created_at);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Novos Artigos</title>
  
</head>
<body>
<h1>Admin - Novos Artigos</h1>

<h2>Adicionar Categoria</h2>
<form method="POST">
    <input type="text" name="category_name" placeholder="Nome da Categoria " required>
    <br><br>
    <button type="submit" name="add_category">Adicionar Categoria</button>
</form>
<hr>
<h2>Adicionar Artigo</h2>
<form method="POST">
    <input type="text" name="article_title" placeholder="Titulo do Artigo" required>
    <br><br>
    <textarea name="article_content" placeholder="Descrição do artigo" required></textarea>
    <br><br>
    <select name="category_id" required>
        <option value="">Selecione a Categoria</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <br><br>
    <button type="submit" name="add_article">Adicionar Artigo</button>
</form>
<hr>
<h1>Categorias</h1>
<ul>
    <?php foreach ($categories as $category): ?>
        <li><?php echo $category['name']; ?></li>
    <?php endforeach; ?>
</ul>
<hr>
<h1>Artigos</h1>
<div>
    <?php listArticles($articles, $categories); ?>
</div>
<form action="teste.php" method="get">
    <button type="submit">Pagina Inicial</button>
</form>
</body>
</html>
