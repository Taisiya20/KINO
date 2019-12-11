<?php
include 'toolbar.php';
include 'my_sql.php';

$id=key($_POST);
if ($id!=NULL){
    $res=sql_get_id($dbh,$id);
    var_dump($res);
    die();
}




