<?php

function make_hall($rows,$seat,$prem=NULL){
    echo '<div class="elt-seat" style="text-align: center" >';
    echo '<form method="post">';
    echo '<table>';
    for ($i = 1; $i <= $rows; $i++) {
        echo '<tr>';
        echo "<td>Ряд $i </td>";
        for ($j = 1; $j <= $seat; $j++) {

            echo '<td>';
            echo '<label>';
            echo '<input type="checkbox">';
            echo "<div>$j</div>";
            echo '</label>';
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
//    echo 'test';
//    echo '<input type="submit" name="action" value="Регистрация" />';
//    if ()
    echo '<input type="submit" value="Забронировать">';

    echo '</form>';
    echo '</div>';

}
// make_hall(5,5);