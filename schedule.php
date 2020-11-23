<?php
include 'toolbar.php';
include 'my_sql.php';
require_once 'area_gen.php';

$sql = "SELECT * FROM `soonfilms`";
$res = sql_q($sql, $dbh, 'info');
$i = 0;
//var_dump($res[1]['release']);

//    while (count($res[$i])>$i){
foreach ($res as $key) {
    if ($key['hidden'])
        continue;
    echo '
    <div class="article"> Дата выхода: ' . $key['release'] . '
            <h2>' . $key['title'] . '</h2>            
            <h3> Жанр:' . $key['genre'] . '</h3>';
    if ($key['img'] != NULL) {
        echo sprintf("<img src='%s' alt='' width='512'>", $key['img']);
    }
    echo '<h3> Цена билета:' . $key['price'] . ' рублей</h3>';
    $input = new area_gen();
    echo '<form action="film.php" method="get">';
    $input->make_hidden("film", $key['id']);
    $input->make_submit("time", "10:10");
    $input->make_submit("time", "11:00");
    $input->make_submit("time", "12:45");
    $input->make_submit("time", "15:00");
    $input->make_submit("time", "16:30");
    $input->make_submit("time", "18:10");
    $input->make_submit("time", "19:00");
    echo '</form>';
    echo '</div>';
}