<?php
session_start();
include_once "my_sql.php";


if (!$_SESSION['ed']) {

    header('Location: profile.php');
    die();
}
//var_dump($_SESSION, $_POST);
$action = $_POST['action'];
//var_dump($action);
$article = array(
    'title' => $_POST['title'],
    'plot' => $_POST['plot'],
    'genre' => $_POST['genre'],
    'img' => $_POST['poster'],
    'price' => $_POST['price'],
    'release' => $_POST['time']);

//var_dump($action == 'edit');
if ($action == 'edit') {
    sql_update_article($dbh, $article, $_POST['article_id']);
} else {
    sql_create_article($dbh, $article);
}
header("Location:profile.php");
die();
