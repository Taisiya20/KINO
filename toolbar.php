<?php
    //ini_set('session.use_cookies',true);
    session_start();
    //include 'my_sql.php';

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Кинотеатр MagicStars</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
    <div id="tool">
	
        <!--Это верхний тулбар-->
        <ul><b>
            <li class="tool"><p><a href="index.php">Добро пожаловать!</a></p></li>
            <li class="tool"><p><a href="affiche.php">Афиша</a></p></li>
			<li class="tool"><p><a href="list.php">Расписание</a></p></li>
            <li class="tool"><p><a href="contacts.php">Контакты</a></p></li>
                <?php
            if(isset($_SESSION["name"])) {
                echo '<li class="tool"><p><a href="profile.php">Привет,<i>'.$_SESSION['name'].'</i></a></p></li>';//TODO: Здесь также должно выводиться имя
            }
            else {
                echo '<li class="tool aut"><p><a href="testhand.php">Вход/Регистрация</a></p></li>';//TODO: Здесь должно быть всплывающее окно входа
            }
    echo '</b></ul>';
    echo '</div>';
   // echo '<hr style="size: 5px;color: #DDDDDD">';
    echo '<h1><span>MagicStars</span></h1>';
	


