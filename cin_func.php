<?php
//    function make_hall($rows,$seat,$prem=NULL){
//        echo '<div class="elt-seat">';
//        echo '<table>';
//        for ($i=0;$i<$rows;$i++){
//            echo $i;
//            echo '<tr>';
////            if (($prem!=0)&&($i%2==1)){//если зал люкс и i нечетное
////                echo '</tr>';
////            }
////            else {
////                $r=$i/2;
//                echo "Ряд $i ";
//                for ($j = 0; $j < $seat; $j++) {
////                   $tmp=$j;
//                    echo '<td>';
////                    if (($prem!=0)&&($j%2==1)){//если зал люкс и j нечетное
////                        echo '</td>';
////                    }
////                    else {
////                        if($prem){
////                            $j=$j/2;
////                        }
//                        echo '<label>
//                                <input type="checkbox">'.
//                                "<div>$j</div>".'
//                            </label>';
////                        if($prem){
////                            $j=$tmp;
////                        }
//                        echo '</td>';
////                    }
//                }
//                echo '</tr>';
////           }
//        }
//        echo '</table>';
//    }

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
//    echo '<input type="submit" value="Забронировать">';

    echo '</form>';
    echo '</div>';

}
// make_hall(5,5);