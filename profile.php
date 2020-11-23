<?php
include 'toolbar.php';
include 'my_sql.php';
require_once "area_gen.php";
require_once "form_creator.php";
$sql = 'select * from user_db where name=:name';
$res = sql_q($sql, $dbh, 'info', $_SESSION['name']);
$_SESSION['id'] = $res[0]['id'];

?>

    <div id="info">
        <h3>Информация о пользователе</h3>
        <?php
        echo '<b>Идентификатор пользователя:' . $_SESSION['id'] . '</b><br>';
        echo '<b>Имя пользователя:' . $_SESSION['name'] . '</b><br>';
        if ($_SESSION['ed'] == 1) {
            echo 'Редактор  ';
            echo '<a href="editor.php">Создать/Редактировать статью</a>';
        }
        ?>
        <br><br><br>
        <?php if ((isset($_SESSION['success']) == true)) echo '<p id="cor"><b>Пароль успешно изменен</b></p>'; ?>
        <form action="handler2.php" method="post">
            <?php if ((isset($_SESSION['conf1']) == true)) echo '<p id="wr"><b>Пароли не совпадают</b></p>'; ?>
            <p>Смена пароля(от 8 до 20 символов, только буквы латинского алфавита)</p>
            <input type="password" name="pass1" required pattern="[a-zA-Z0-9]{8,20}"><br>
            <p>Подтвердите пароль</p>
            <input type="password" name="pass2" required pattern="[a-zA-Z0-9]{8,20}"><br><br>
            <input type="submit" name="action" value="Сменить"/>
            <br><br>

        </form>
        <form action="handler2.php" method="post">
            <input type="submit" name="action" value="Выход"/>
        </form>
        <br>
    </div>
<?php
$id = $_SESSION['id'];
$permissions = $_SESSION['ed'];
$sql = "SELECT * FROM `sign` WHERE user_id=$id";
$res = sql_q($sql, $dbh, 'info');

if ($res) {

    echo '<div class="ordered"><h2> Ваши забронированные места</h2>';
    foreach ($res as $seat) {
        $sql_1 = 'Select * from `soonfilms` where `id` = ' . $seat['film_id'];
        $film = sql_q($sql_1, $dbh, 'info')[0]['title'];
        $sql_2 = 'Select * from `cinema` where `id` = ' . $seat['cinema_id'];
        $cinema = sql_q($sql_2, $dbh, 'info')[0]['name'];
        $title = str_pad($film, 100);
        echo "<div class='user_block'>";
        echo "<h3>$title</h3>";
        echo "<div class='line'>";
        echo sprintf("<br><strong>Кинотеатр: %s </strong> <span>Ряд: %d </span><span> Место: %d</span>", str_pad($cinema, 50), $seat['row_'], $seat['seat']);
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
}
if ($permissions) {
    echo '<div class="ordered"><h2> Ваши созданные записи о фильмах</h2>';
    $sql = "SELECT * FROM `soonfilms` where creator_id = $id";
    $res = sql_q($sql, $dbh, 'info');
    $form = new form('post', 'editor.php');
    $input = new area_gen();
    $form->display();
    $input->make_hidden('action', 'create');
    $input->make_submit('submit', 'Создать');
    $form->end();
    foreach ($res as $key) {
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


}

