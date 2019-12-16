<?php
    session_start();
    include_once "my_sql.php";
    var_dump($_POST, $_SESSION);
    $cinema_id = $_POST['cinema'];
    $film_id = $_POST['film'];
    $time = $_POST['time'] . ":00";
    $user_id = $_SESSION['id'];
    foreach ($_POST as $key){
        if (!strpos($key, '_'))
         continue;
        $stock = explode("_", $key);
        $row = $stock[0];
        $seat = $stock[1];
//        sql_sign($dbh, $time, $cinema_id, $film_id, $row, $seat, $user_id);
    }
    header("location:profile.php");
    die();

