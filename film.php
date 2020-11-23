<?php
include 'my_sql.php';
include 'toolbar.php';
require_once 'cin_func.php';

$sql = 'select * from cinema';
$res = sql_q($sql, $dbh, 'info');
//var_dump($res);
echo '
    <div class="hall">

        <h2>Выбор кинотеатра</h2>

        <form method="post">
            <select name="cinema" onchange="void this.form.submit();">
                <option disabled selected value="smth">Выбор кинотеатра</option>';

//var_dump($res);
foreach ($res as $cinema){
//    var_dump($cinema);
//    echo $cinema['id'], '            ', $cinema['name'];
    echo sprintf('<option value="%d">Кинотеатр "%s"</option>', $cinema['id'], $cinema['name']);
}

    echo '        </select>
        </form>';

if ($_POST['cinema'] != NULL)
{
    $cinema_ = $res[(int)$_POST['cinema'] - 1];

    echo sprintf("<h2>Зал кинотеатра \"%s\"</h2>", $cinema_['name']);

    make_hall($dbh, $cinema_['row_'], $cinema_['seat'], 1);
    echo '</div>';
}

//switch ($cinema) {
//
//    case 'star':
//        echo "<h2>Зал кинотеатра \"Звезда\"</h2>";
//        include 'cinemastar.php';
//        $row = 11;
//        $seat = 28;
//        make_hall($dbh, $row, $seat, 1);
//        break;
//    case 'park':
//        echo "<h2>Зал кинотеатра \"Парк\"</h2>";
//        include 'cinemapark.php';
//        break;
//    case 'lux':
//        echo "<h2>Зал кинотеатра \"Люкс\"</h2>";
//        include 'cinemalux.php';
//        break;
//    case 'formula':
//        echo "<h2>Зал кинотеатра \"Hollywood\"</h2>";
//        include 'cinemaHol.php';
//        break;
//    case null:
//        break;
//    default:
//        echo '<p class="wr">Попробуйте еще раз</p>';
//}
echo '</div>';
//    $seat_count=0;
//    $Seat=array([0]=>0);
//    for ($j=0;$j<11;){
//        for($i=0;$i<30;){
//            if ($_POST["s[$j][$i]"]==1){
//                $Seat["$seat_count"]=100*$j+$i;
//                $seat_count++;
//            }
//        }
//    }
//    $msg="Здравствуйте ".$_SESSION['name']."!\n Вы забронировали места : ";
//    for ($k=0;$k<count($Seat);$k++){
//        $msg=+"ряд Э$Seat[$k]/100"
//    }
//    mail('denis.mazohin@ya.ru','Бронирование билетов',$msg);
//    if(($_POST['action']=='tr')&&($seat_count!=0)){
//    mail('denis.mazohin@ya.ru','test','success');}