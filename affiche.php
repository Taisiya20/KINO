<?php
include 'toolbar.php';
include 'my_sql.php';
?>

<div style="margin-left: 13% ">
    <img src='img/1kino.jpg'>
</div>
<?php
$flag = 0;
$sql = "with a as (SELECT distinct genre  FROM `soonfilms` where hidden=False order by genre)

select row_number() over (order by genre) id, genre
from a
order by genre;";
$genres = sql_q($sql, $dbh, 'info');
if ($_POST['genre'] == NULL or $_POST['genre'] == 'default')
    $flag = 1;
echo '<div class="filter"><h2>Выбор жанра</h2>

        <form method="post">
            <select id="box" name="genre" onchange="void this.form.submit();">
                <option disabled value="0">Жанры</option>';
if ($flag == 1)
    echo '<option selected value="default">По умолчанию</option>';
else
    echo '<option value="default">По умолчанию</option>';
foreach ($genres as $genre) {
    echo "<option ";
    if ($genres[(int)$_POST['genre'] - 1]['genre'] == $genre['genre'])
        echo ' selected ';
    echo " value=" . $genre['id'] . ">" . $genre['genre'] . "</option>";
}
echo '</select>
        </form><br>';
$sql = "SELECT * FROM `soonfilms`";
if ($_POST['genre'] != NULL && $_POST['genre'] != 'default') {
    echo '<h1>' . $genres[(int)$_POST['genre'] - 1]['genre'] . '</h1>';
    $sql .= " where genre='" . $genres[(int)$_POST['genre'] - 1]['genre'] . "'";
}
$sql .= ' order by `release` desc';
//echo $sql;
echo '</div>';
$res = sql_q($sql, $dbh, 'info');
$i = 0;

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
    //<h3> Возраст:'.$res[$i]['age'].'</h3>
    echo '<h3> Цена билета:' . $key['price'] . ' рублей</h3>
            <p class="plot">' . $key['plot'] . '<p>
            <form action="list.php" method="post">
            <div class="choose">
            <input type="hidden" name="film_id" value="'. $key['id'] .'"> 
            <input type="hidden" name="film_title" value="'. $key['title'] .'"> 
            <input type="submit" name="' . $key['id'] . '" value="выбрать места"></div></form>
    </div>';
}

?>
<div style="margin-left: 13% ">
    <img src='img/2kino.jpg'>
    </div>
	
		