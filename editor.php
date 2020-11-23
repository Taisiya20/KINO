<?php
session_start();

include 'my_sql.php';

//    var_dump($_SESSION, $_POST);
if (($_SESSION['ed'] == 0) || ($_SESSION['name'] == NULL)) {
    header('Location: profile.php');
    die();
}

if ($_POST['action'] == 'hide') {
    //        var_dump($status);
    $sql = "UPDATE `soonfilms` set `hidden`=";
    if ($_POST['status'])
        $sql .= "0";
    else
        $sql .= "1";
    $sql .= " WHERE `id`=" . $_POST['article'];

//        var_dump($sql);
//        die();
    $sth = $dbh->prepare($sql);
    $sth->execute();
    header("location:profile.php");
    die();
} else if ($_POST['action'] == 'remove') {
    $sql = "DELETE FROM `soonfilms` WHERE `id`=" . $_POST['article'];
    $sth = $dbh->prepare($sql);
    $a = $sth->execute();
//        var_dump($sql);
//        var_dump($a);

    header("location:profile.php");
    die();
}

function get_article($dbh)
{
    $id = $_POST['article'];
    $sql = "SELECT * FROM `soonfilms` where id = $id";
    $res = sql_q($sql, $dbh, 'info');
    $article = $res[0];
    return ($article);
}

include 'toolbar.php';
require_once "area_gen.php";
require_once "form_creator.php";
if ($_POST['action'] == 'edit')
    $article = get_article($dbh);
//    var_dump($article);
$input = new area_gen();
$form = new form('post', 'edit.php');
echo '<div class="line user_block">';
echo "<form class='edit_news' method='post' action='edit.php'>";
$input->make_hidden('action', $_POST['action']);
$input->make_hidden('article_id', $_POST['article']);

$input->make_input_echo('title', 'Введите название', '', ($article) ? ($article['title']) : (null));
$input->make_input_echo('genre', 'Введите жанр', '', ($article) ? ($article['genre']) : (null));
$input->make_input_echo('poster', 'Введите url Постера', '', ($article) ? ($article['img']) : (null));

$input->make_input_echo('price', 'Введите цену в рублях', '[0-9]{,4}', ($article) ? ($article['price']) : (null));

echo "<input type='date' name='time' value='";
echo ($article) ? ($article['release']) : (null);
echo "'>";

echo "<textarea name='plot' placeholder='Введите описание'>";
echo ($article) ? ($article['plot']) : (null);
echo "</textarea>";

$input->make_submit('submit', 'Закончить редактирование');
$form->end();
echo '</div>';