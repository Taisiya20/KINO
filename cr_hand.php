<?
$ch=$_POST['author'];
$_SESSION['ch']=$_POST['author'];
// var_dump($_POST['author']);
//function alp(){header('location:article.php');}
switch ($ch){
    case 'edit':
        $res = sql_art_down($dbh, $_SESSION['id']);
        if (count($res)==0){
            header('location:article.php');
        }
        echo'<div id="info"><form method="post" action="article.php" name="id" ">';

        $j = 0;

        echo '<ul>';

        while (count($res) > $j) {
            $idf=$res[$j]['id'];
            $titf=$res[$j]['title'];
            echo "<li><input type='submit' name='$idf' value='Название:$titf'></li>";
            $j++;
        }
//            echo '<input type="submit">';
        echo '</ul></form></div>';
        break;
    case 'create':
        header ('location:article.php');
        break;
}