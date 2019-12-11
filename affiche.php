
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

    while (count($res[$i])>$i){
    echo'
    <div class="article"> Дата выхода: '.$res[$i]['release'].'
            <h2>'.$res[$i]['title'].'</h2>
            <h3> Жанр:'.$res[$i]['genre'].'</h3>
			<h3> Возраст:'.$res[$i]['age'].'</h3>
			<h3> Цена билета:'.$res[$i]['price'].'</h3>
            <p class="plot">'.$res[$i]['plot'].'<p>
            <form action="film.php" method="post"><div class="choose"><input type="submit" name="'.$res[$i]['id'].'" value="выбрать места"></div></form>
    </div>';
    $i++;
    }

?>
<div style="margin-left: 13% ">
	<img src='img/2kino.jpg'>
	<img></div>
	
		