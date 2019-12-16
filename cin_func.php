<?php

include_once "my_sql.php";

function get_vacant($res, $row, $seat){


    foreach ($res as $key)
    {
        if ($key['row'] == $row)
            if ($key['seat'] == $seat)
                return (false);
    }
    return (true);
}


function make_hall($dbh, $rows, $seat, $cinema_id){

    $time = $_GET['time'] . ':00';
    $sql = "SELECT * FROM `sign` WHERE `cinema_id`=$cinema_id  AND `film_id`=". $_GET['film'] . " AND `time`='$time';" ;
    $res=sql_q($sql,$dbh,'info');
//    var_dump($sql);
//    var_dump($res);
    echo "<div class='line user_block'>";
    echo '<form method="post" action="create_sign.php">';
    echo '<div class="elt-seat" style="text-align: center" >';
    echo "<input type='hidden' name='cinema' value='$cinema_id'>";
    echo "<input type='hidden' name='time' value='" . $_GET['time'] ."'>";
    echo "<input type='hidden' name='film' value='" . $_GET['film'] ."'>";
    echo '<table>';
    for ($i = 1; $i <= $rows; $i++) {
        echo '<tr>';
        echo "<td>Ряд $i </td>";
        for ($j = 1; $j <= $seat; $j++) {

//            $seats = $i * $j + $j;
            $seats_name = $i. '_' .$j;
            echo '<td>';
            echo '<label>';
            if (get_vacant($res, $i, $j))
                echo "<input type='checkbox' name='$seats_name' value='$seats_name'>";
            else
                echo "<input class='occupied' disabled type='checkbox' name='$seats_name' value='$seats_name'>";
            echo "<div>$j</div>";
            echo '</label>';
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table></div>';
    echo "<div>";
    echo "<input class='__r right __s html_architect' type='submit' value='Забронировать'>";
    echo "</div>";
//    echo '<input type="submit" name="action" value="Регистрация" />';
//    if ()
//    echo '<input type="submit" name="submit" value="Забронировать">';

    echo '</form>';
    echo '</div>';

}
// make_hall(5,5);