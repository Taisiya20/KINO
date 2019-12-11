<?php
//    include 'my_sql.php';
//    session_start();
    $art=array(
        title=>$_POST['title'],
        release=>$_POST['release'],
        genre=>$_POST['genre'],
        plot=>$_POST['plot'],
        creator_id=>$_SESSION['id'],
    );
//    $art['title']=$_POST['title'];
//    $art['release']=$_POST['release'];
//    $art['genre']=$_POST['genre'];
//    $art['plot']=$_POST['plot'];
//    $art['creator_id']=$_SESSION['id'];
//var_dump($_POST);
//die();i
    $i=1;
    $tmp=$art['genre'][0];//tmp-string
    while(count($art['genre'])>($i+1)){//count=1..3
        $tmp=$tmp.' '.$art['genre'][$i];
        $i++;
    }
    var_dump($tmp);
    die;
    echo'\n';
    var_dump($art);
    die();
    $alp=(isset($art['title']))&&(isset($art['release']))&&(isset($art['genre']))&&(isset($art['plot']));
//    var_dump($art);
    $art['creator_id']=$_SESSION['id']+0;

    if ($alp){
        $a=sql_art_up($art,$dbh);
        var_dump($a);
    }

die();