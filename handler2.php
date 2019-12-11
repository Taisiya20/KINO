<?php
    session_start();
    include 'my_sql.php';

    if ($_POST['action'] == 'Выход'){

        session_unset();

        header('Location:index.php');// 'auth.php';
        die();
    }

    $pass1=htmlspecialchars($_POST['pass1']);
    $pass2=htmlspecialchars($_POST['pass2']);

    if ($pass1!=$pass2){
        $_SESSION['conf1']=false;
        header ('location:profile.php');
        die;
    }

    if ($_POST['action'] == 'Сменить'){
        $sql = "UPDATE user_db SET pass=:pass1 WHERE name=:name;";
        $_SESSION['success']=sql_c($sql,$dbh,$_SESSION['name'],$pass1);
        header ('location:profile.php');
        die;
    }
