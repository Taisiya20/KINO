<?php
    include 'cin_func.php';
    include_once "my_sql.php";
    $row = 18;
    $seat = 25;
    make_hall($dbh, $row, $seat, 2);