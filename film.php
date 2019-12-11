<?php
//include 'err.php';
include 'my_sql.php';
include 'toolbar.php';


?>
    <div class="hall">

        <h2>Выбор кинотеатра</h2>

        <form method="post">
            <select name="cinema" onchange="void this.form.submit();">
                <option disabled selected value="1">Выбор кинотеатра</option>
                <option value="star">Кинотеатр "Звезда"</option>
                <option value="park">Кинотеатр "Парк"</option>
                <option value="lux">Кинотеатр "Люкс"</option>
                <option value="formula">Кинотеатр "Hollywood"</option>
            </select>
        </form>

<?php
$cinema=$_POST['cinema'];

switch ($cinema){

    case 'star':
        echo "<h2>Зал кинотеатра \"Звезда\"</h2>";
        include 'cinemastar.php';
        break;
    case 'park':
        echo "<h2>Зал кинотеатра \"Парк\"</h2>";
        include 'cinemapark.php';
        break;
    case 'lux':
        echo "<h2>Зал кинотеатра \"Люкс\"</h2>";
        include 'cinemalux.php';
        break;
    case 'formula':
        echo "<h2>Зал кинотеатра \"Hollywood\"</h2>";
        include 'cinemaHol.php';
        break;
    case '1':
        break;
    default:
        echo '<p class="wr">Попробуйте еще раз</p>';
}
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