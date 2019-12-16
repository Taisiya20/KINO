<?php

    //include 'err.php';
    $dsn = 'mysql:dbname=den_test;host=localhost';
    $user = 'den';
    $password = 'jDhIIhWLmBqX';
    try {
        $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8mb4 collate utf8mb4_general_ci'));
    } catch (PDOException $e) {
        echo 'Подключение не удалось: ' . $e->getMessage();
    }
    function    sql_q($sql, $dbh, $key, $var=NULL)
    {
        $sth = $dbh->prepare($sql);
        if ($var!=NULL) {
        $sth->bindParam(':name', $var, PDO::PARAM_STR);
        }
        $c=$sth->execute();
//        var_dump($c);
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        switch ($key){
            case 'id':
                return $res[0]['id'];
                break;
            case 'info':
                return $res;
                break;
            case 'name':
                $a=0;
                if ($res[0]['name']!=NULL) {$a++;};

                return $a;
                break;
            default:
                return $c;
                break;
        }

    }

    function    sql_c($sql, $dbh, $name, $pass){
        $sth = $dbh->prepare($sql);
        $sth->bindParam(':name', $name, PDO::PARAM_STR);
        $sth->bindParam(':pass', $pass, PDO::PARAM_STR);

        $a = $sth->execute();
        return $a;
    }
    function    sql_create_article($dbh, $art)
    {
        $sql = "INSERT INTO `soonfilms` SET `title`=?,`release`=?, `plot`=?, `price`=?, `creator_id`=?";
        $sth=$dbh->prepare($sql);
        $a=$sth->execute(array($art['title'], $art['release'], $art['plot'], $art['price'], $_SESSION['id']));
//        var_dump($sth, $sql);
        return $a;
    }

    function    sql_get_id($dbh,$id)//$id -art_id
    {
        $sql = "Select * from soonfilms where creator_id=".$_SESSION['id']." and id=$id";
        //echo $sql;
        $res=sql_q($sql,$dbh,'info');
        return $res[0];
    }

    function    sql_update_article($dbh, $art, $id){

        $sql = "UPDATE `soonfilms` SET `title`=?,`release`=?, `plot`=?, `price`=?, `creator_id`=? WHERE `id`=$id ";//
        $sth=$dbh->prepare($sql);
        $a=$sth->execute(array($art['title'], $art['release'], $art['plot'], $art['price'], $_SESSION['id']));
//        var_dump($sth);
//        var_dump($a);
    }

    function    sql_sign($dbh, $time, $cinema_id, $film_id, $row, $seat, $user_id)
    {
        $sql = "INSERT INTO `sign` set `cinema_id`=$cinema_id, `user_id`=$user_id, `film_id`=$film_id, `row`=$row, `seat`=$seat, `time`='$time'";
        $sth=$dbh->prepare($sql);
        $a=$sth->execute();
        return $a;
    }

    function    sql_get_signs($dbh, $time, $cinema_id, $film_id, $user_id = null)
    {
        if ($user_id)
            $sql = "SELECT row, seat FROM `sign` WHERE `time`=$time, `cinema_id`=$cinema_id, `film_id`=$film_id";
        else
            $sql = "SELECT row, seat FROM `sign` WHERE `time`=$time, `cinema_id`=$cinema_id, `film_id`=$film_id, `user_id`=$user_id";
        $sth=$dbh->prepare($sql);
        $a=$sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    function    sql_get_all_users($dbh)
    {
        $sql = "Select id, name, red  from user_db";
        $sth=$dbh->prepare($sql);
        $a=$sth->execute();
        if ($a)
            $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        else
            echo "Ошибка в запросе к таблице пользователей";
        return $res;
    }
    function    sql_change_permission($dbh, $id, $new)
    {
        $sql = "UPDATE `user_db` SET `red`='$new' WHERE `id`='$id'";
//        var_dump($sql);
        $sth = $dbh->prepare($sql);
        $a = $sth->execute();
    }



