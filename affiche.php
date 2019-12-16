
<?php
    include 'toolbar.php';
    include 'my_sql.php';
	?>
	
	<div style="margin-left: 13% ">
	<img src='img/1kino.jpg'>
	<img></div>
<?php


    $sql ="SELECT * FROM `soonfilms`";
    $res=sql_q($sql,$dbh,'info');
    $i=0;
    //var_dump($res[1]['release']);

//    while (count($res[$i])>$i){
    foreach ($res as $key){
        if ($key['hidden'])
            continue;
    echo'
    <div class="article"> Дата выхода: '. $key['release'].'
            <h2>' . $key['title'] . '</h2>';
            //<h3> Жанр:'.$res[$i]['genre'].'</h3>
			//<h3> Возраст:'.$res[$i]['age'].'</h3>
    echo '<h3> Цена билета:' . $key['price'] . ' рублей</h3>
            <p class="plot">' . $key['plot'] . '<p>
            <form action="list.php" method="post"><div class="choose"><input type="submit" name="'.$key['id'].'" value="выбрать места"></div></form>
    </div>';
    }

?>
<div style="margin-left: 13% ">
	<img src='img/2kino.jpg'>
	<img></div>
	
		