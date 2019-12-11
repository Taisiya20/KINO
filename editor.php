<?php
    session_start();
    //die(var_dump($_SESSION['ed']));
//    var_dump($_SESSION);
//    die(($_SESSION['ed']==0)||($_SESSION['name']==NULL));
    if (($_SESSION['ed']==0)||($_SESSION['name']==NULL)) {
        header('Location: profile.php');
        die();
    }

    include 'toolbar.php';
    include_once 'my_sql.php';
?>
    <form method="post" action="cr_hand">
        <select name="author" onchange="void this.form.submit();">
            <option disabled selected value="1">Выбор</option>
            <option value="create">Создать статью</option>
            <option value="edit">Редактировать статью</option>
        </select>
    </form>
<?php

