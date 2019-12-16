<?php
    include 'cin_func.php';
    include_once "my_sql.php";

    $row = 11;
    $seat = 28;
    make_hall($dbh, $row, $seat, 4);