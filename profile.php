<?php
    include 'toolbar.php';
    include 'my_sql.php';
    require_once "area_gen.php";
    require_once "form_creator.php";
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
<?php
    $id = $_SESSION['id'];
    $permissions = $_SESSION['ed'];
    $sql = "SELECT * FROM `sign` WHERE user_id=$id";
    $res=sql_q($sql,$dbh,'info');
//    foreach ($res as $key)
//    {
//        $title
//        echo "<div class='user_block line'>";
//        echo "<h3>$title</h3>";
//    }
    if ($permissions) {

        $sql ="SELECT * FROM `soonfilms` where creator_id = $id";
        $res=sql_q($sql,$dbh,'info');
        foreach ($res as $key) {
//            var_dump($key);
            $title = str_pad($key['title'], 100);
            $form = new form('post', 'editor.php');
            $input = new area_gen();
            echo "<div class='user_block'>";
            echo "<h3>$title</h3>";
            echo "<div class='line'>";
            $form->display();
            $input->make_hidden('article', $key['id']);
            $input->make_hidden('action', 'edit');
            $input->make_submit('submit', 'Изменить');
            $form->end();

            $form->display();
            $input->make_hidden('article', $key['id']);
            $input->make_hidden('status', $key['hidden']);
            $input->make_hidden('action', 'hide');
            if (!$key['hidden'])
                $input->make_submit('submit', 'Скрыть');
            else
                $input->make_submit('submit', 'Показать');
            $form->end();

            $form->display();
            $input->make_hidden('article', $key['id']);
            $input->make_hidden('action', 'remove');
            $input->make_submit('submit', 'Удалить');
            $form->end();
            echo "</div>";
            echo "</div>";

        }
        $form = new form('post', 'editor.php');
        $input = new area_gen();

        $form->display();
        $input->make_hidden('action', 'create');
        $input->make_submit('submit', 'Создать');
        $form->end();
    }

?>
