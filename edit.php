<?php
    session_start();
    function checkpost(){
        $a=array(
            'too_much'=>false,
            'no'=>array(
                'title'=>false,
                'genre'=>false,
                'release'=>false,
                'plot'=>false,
            )
        );

        if (count($_POST['genre'])>3) $a['too_much']=true;//слишком много жанров

        elseif (count($_POST['genre'])==0)  $a['no']['genre']=true;//нет жанров

        if ($_POST['title']=='') $a['no']['title']=true;//нет названия
        if ($_POST['release']=='') $a['no']['release']=true;//нет даты релиза
        if ($_POST['plot']=='') $a['no']['plot']=true;//нет описания
        if ($a['too_much']||$a['no']['genre']||$a['no']['title']||$a['no']['release']||$a['no']['plot'])    return $a;
        else return NULL;
    }
    if (!$_SESSION['ed']){
    header('Location: profile.php');
    die();
}//проверка на edit_ability
//    if (!isset($_SESSION['try']))   $_SESSION['try']=0;
//    //если попытка не первая
//    if ($_SESSION['try']!=0){
//    $status=checkpost();//получение массива или нуля
//        if(($status)==NULL) {
//            header ('location:creator.php');
//            die();
//        }//запись в базу при возврате NULL and die
//
//        else {
//            var_dump($status);//узнать почему так
//        }
//    }
//    $gen = array(1 => 'аниме',
//    'биография', 'боевик', 'вестерн', 'военный', 'детектив', 'детский', 'для взрослых', 'документальный', 'драма', 'игра', 'история', 'комедия', 'концерт', 'короткометражка', 'криминал', 'мелодрама', 'музыка', 'мультфильм', 'мюзикл', 'новости', 'приключения', 'реальное ТВ', 'семейный', 'спорт', 'ток-шоу', 'триллер', 'ужасы', 'фантастика', 'фильм-нуар', 'фэнтези',);

    if($_POST['ch']=='edit') {


        }
        else{

           die;
        }

//
//
//
//            if ($res==NULL)
//                echo ""
//            <input type='text"' name='title' size='20' value='.$.'><br>
//            <input type="date" name="release"><br>
//            <select name="genre[]" multiple size="5">  ';
//
//                for ($i; $i <= count($gen); $i++) {
//                    echo "<option name='$i'>$gen[$i]</option>";
//                }
//                echo '</select><br>
//
//            <textarea name="plot" rows="5" size="100"></textarea><br>
//            <input type="submit">';
//            }
//            else {//Редактирование
//
//            for ($i = 0; $i < count($res); $i++) {
//                echo "<a href='#.php'>" . $res[$i]['title'] . "</a><br>";//выбор из созданных пользователем статей, какую он хочет редактировать
//            }
//        }
//    }
//            echo '<input type="text" name="title" value="'.$res[0]['title'];
//            echo '><br>
//        <input type="date" name="release" value="'.$res[0]['release'].'"><br>
//        Выбранные жанры:'.$res[0]['genre'].'<br>
//        <select name="genre" multiple size="3">';
//           for ($i;$i<=count($gen);$i++){
//                echo "<option name='$i'>$gen[$i]</option>";
//           }
//        echo '</select>
//        <br>
//        <input type="text" name="plot" value="'.$res[0]['plot'].'" size="200">
//        <input type="submit">
//    ';
//
//    }
//    echo '</form></div>';
//    echo count($gen);
//
//    //sql_art_up()
//



