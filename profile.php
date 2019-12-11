<?php
    include 'toolbar.php';
    include 'my_sql.php';
    $sql='select * from user_db where name=:name';
    $res=sql_q($sql,$dbh,'info',$_SESSION['name']);
    $_SESSION['id']=$res[0]['id'];

    //  var_dump($_SESSION['id']);
?>

<div id="info">
    <h3>Информация о пользователе</h3>
    <?php
//        echo $_SESSION['id'];
        echo '<b>Идентификатор пользователя:'.$_SESSION['id'].'</b><br>';
        echo '<b>Имя пользователя:'.$_SESSION['name'].'</b><br>';
        //var_dump($_SESSION['ed']);
        if ($_SESSION['ed']==1){
            echo 'Редактор  ';
            echo '<a href="editor.php">Создать/Редактировать статью</a>';
        }
    ?>
    <br><br><br>
    <?php if((isset($_SESSION['success'])==true)) echo '<p id="cor"><b>Пароль успешно изменен</b></p>'; ?>
    <form action="handler2.php" method="post">
    <?php if((isset($_SESSION['conf1'])==true)) echo '<p id="wr"><b>Пароли не совпадают</b></p>'; ?>
    <p>Смена пароля(от 8 до 20 символов, только буквы латинского алфавита)</p>
    <input type="password" name="pass1" required pattern="[a-zA-Z0-9]{8,20}"><br>
    <p>Подтвердите пароль</p>
    <input type="password" name="pass2" required pattern="[a-zA-Z0-9]{8,20}"><br><br>
    <input type="submit" name="action" value="Сменить" />
    <br><br>

    </form>
    <form action="handler2.php" method="post">
    <input type="submit" name="action" value="Выход" />
    </form>
    <br>
    </div>
    </body>
</html>