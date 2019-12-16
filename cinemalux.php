<?php
    include 'cin_func.php';
    include_once "my_sql.php";
    $row = 4;
    $seat = 10;
    make_hall($dbh, $row, $seat, 3);