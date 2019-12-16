<?php

require_once ("my_sql.php");
//if (!$_COOKIE['master']){
//    header("location:index.php");
//    die();
//}
$id = $_POST['user'];
switch ($_POST['action']){
    case "change_permissions":
        echo "sql_change_permissions";
        sql_change_permission($dbh, $id, $_POST['permission']);
        break;
    case "banned":
        echo "banned";
        sql_change_permission($dbh, $id, -1);
        break;
    case "Lookup":
        echo "Lookup";
        sql_get_all_users($dbh);
        break;
    default:
        header("Location:index.php");
        die();
        break;
}
header("Location:admin.php");
die();