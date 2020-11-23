<?php
include_once("toolbar.php");
require_once("my_sql.php");


echo "<h1 class='title'>Админка</h1>";
//if (!$_COOKIE['master']){
//    header("location:index.php");
//    die();
//}
define('USER', 0);
define('EDITOR', 1);
define('ADMIN', 2);
echo '<div>';
$permission = [
    USER, EDITOR, ADMIN
];
$users = sql_get_all_users($dbh);
//            var_dump($users);
foreach ($users as $key) {
    $id = $key['id'];
    $name = $key['name'];
    $permissions = $key['red'];
    echo "<div class='user_block line'>
                            <h3>$id    $name</h3>
                        <form class='d-flex d-between d-center' method='post' action='hand_admin.php'>
                        <h4>Права пользователя</h4>
                            <input type='hidden' name='user' value='$id'>
                            <input type='hidden' name='action' value='change_permissions'>
                            <select name='permission'>";
    echo "<option selected>$permissions</option>";
    foreach ($permission as $i) {
        if ($i == $permissions)
            continue;
        else
            echo "<option>$i</option>";
    }
    echo "</select><input type='submit'  class='__r right __s html_architect' value='Изменить'>
                        </form>";
    echo "<form class='d-flex d-between d-center' method='post' action='hand_admin.php'>
                            <input type='hidden' name='user' value='$id'>
                            <input type='hidden' name='action' value='banned'>
                            <input type='submit'  class='__r right __s html_architect' value='Забанить'>
                        </form>
                        <form class='d-flex d-between d-center' method='post' action='admin.php'>
                            <input type='hidden' name='user' value='$id'>
                            <input type='hidden' name='action' value='Lookup'>
                            <input type='submit'  class='__r right __s html_architect' value='Просмотреть записи[не работает]'>
                        </form>
                    </div>";
}
?>
    </div>
    </section>
<?php
include_once("footer.php");
//	if($_COOKIE['id'] != 'god')
//		header('location:https://www.google.com/search?q=%D0%BF%D0%BE%D1%87%D0%B5%D0%BC%D1%83+%D1%8F+%D0%B3%D0%B5%D0%B9+%D0%B8+%D0%B4%D0%BE%D0%BB%D0%B1%D0%B0%D0%B5%D0%B1+%D0%BB%D0%B5%D0%B7%D1%83+%D0%BA%D1%83%D0%B4%D0%B0+%D0%BD%D0%B5+%D0%BD%D0%B0%D0%B4%D0%BE%3F&oq=%D0%BF%D0%BE%D1%87%D0%B5%D0%BC%D1%83+%D1%8F+%D0%B3%D0%B5%D0%B9+%D0%B8+%D0%B4%D0%BE%D0%BB%D0%B1%D0%B0%D0%B5%D0%B1+%D0%BB%D0%B5%D0%B7%D1%83+%D0%BA%D1%83%D0%B4%D0%B0+%D0%BD%D0%B5+%D0%BD%D0%B0%D0%B4%D0%BE%3F&aqs=chrome..69i57.814j0j0&sourceid=chrome&ie=UTF-8');
