<?php
// data.php
session_start();

if (!isset($_SESSION['categories'])) {
    $_SESSION['categories'] = [];
}

if (!isset($_SESSION['articles'])) {
    $_SESSION['articles'] = [];
}

$categories = $_SESSION['categories'];
$articles = $_SESSION['articles'];
?>