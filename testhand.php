<?php
/**
 * Created by PhpStorm.
 * User: denco
 * Date: 06.12.2018
 * Time: 18:48
 */

    session_start();
    include 'my_sql.php';
    if ($_SESSION['name']!=NULL){
        header('Location:profile.php');
        die();
    }
    $status_err = [
        'wr conf' => false,//пароли не совпадают
        'user exist' => false,// пользователь с данным именем уже существует
        'user !exist' => false,//пользователь с данным именем не существует
        'wr pass' => false//неправильный пароль
    ];
    $status_err['wr pass']=false;
    $status_err['user !exist']=false;
    $status_err['user exist']=false;
    $status_err['wr conf']=false;
    if (($_POST['username']!=NULL)||($_POST['username_reg']!=NULL)) {
        $options = [
            'cost' => 13,
        ];
        if ($_POST['action'] == 'Регистрация') {
            //форма регистрации
            $reg_name = htmlspecialchars($_POST['username_reg']);
            $passconf1 = htmlspecialchars($_POST['pass-conf']);
            $passconf2 = htmlspecialchars($_POST['pass+conf']);


            $sql = "SELECT * FROM user_db where name=:name";
            $a = sql_q($sql, $dbh, 'name', $reg_name);

            //проверка правильности подвержения пароля
            if (($passconf1 == $passconf2) && ($a == 0)) {
                $status_err['conf wr'] = false;
                $passconf1 = password_hash($passconf1,PASSWORD_BCRYPT, $options);
                $sql = 'Insert into user_db(name,pass) values(:name,:pass);';
                $a = sql_c($sql, $dbh, $reg_name, $passconf1);
                if ($a) {
                    $_SESSION['name'] = $reg_name;
                    $sql = "SELECT * FROM user_db where name=:name";
                    $idf= sql_q($sql, $dbh, 'id', $reg_name);//получение id пользователя
//                    var_dump($idf);
                    $_SESSION['id']=$idf;
//                    die(var_dump($_SESSION['id']));
                    $_SESSION['ed']=0;
                    header('Location:index.php');//переход на страницу профиля

                    die();
                } else {
                    echo 'обнаружен баг, напишите разработчику, e-mail:denis.mazohin@ya.ru';
                    die();
                }
            } else {
                if ($passconf1 != $passconf2)
                    $status_err['wr conf'] = true;
                if ($a != 0)
                    $status_err['user exist'] = true;
            }
        } else {//sign
            //die('!');
            //форма входа
            $name = htmlspecialchars($_POST['username']);
            $pass = htmlspecialchars($_POST['pass']);

            $sql = "SELECT * FROM user_db where name=:name";
            $a=sql_q($sql,$dbh,'name',$name);

            if ($a != 0) {
                $res = sql_q($sql, $dbh, 'info', $name);
                if ($res == NULL) {
                    echo 'обнаружен баг, напишите разработчику, e-mail:denis.mazohin@ya.ru';
                    die();
                }
                if ($pass == $res[0]['pass'] || password_verify($pass, $res[0]['pass'])) {
                    $_SESSION['id'] = $res[0]['id'];// выдается id
                    $_SESSION['name'] = $res[0]['name'];//сессии передаётся имя пользователя для вывода его на экране

                    $_SESSION['ed']=$res[0]['red'];
                   // var_dump($_SESSION['ed']);
                    header('Location:index.php');
                    die();
                } else
                    $status_err['wr pass'] = true;
            } else {
                $status_err['user !exist'] = true;
            }
        }
    }

    include 'toolbar.php';
   // var_dump($status_err);
?>

        <div id="au">
            <ul>
                <li>
                    <form action="testhand.php" method="post">
                        <h2 style="text-align: center">Вход</h2>
                        <div class="b_act">
                        <?php if($status_err['user !exist']==true) echo '<p id="wr"><b>Данного пользователя не существует</b></p>'; ?>
                        <p> Имя пользователя(от 5 до 20 символов, только буквы латинского алфавита)</p>
                        <input type="text" name="username" required pattern="[a-zA-Z0-9]{5,20}">
                        <?php if($status_err['wr pass']==true) echo '<p id="wr"><b>Неверный пароль</b></p>'; ?>
                        <p>Пароль(от 8 до 20 символов, только буквы латинского алфавита)</p>
                        <input type="password" name="pass" required pattern="[a-zA-Z0-9]{8,20}"><br>
                        <!--        <p style="text-align: left" class="button"> <button>Вход</button>       <button>Регистрация</button></p>>-->
                        <br>

                        <input class="b_act" type="submit" name="action" value="Вход" />
                        </div>
                    </form>
                </li>
                <li>
                    <form action="testhand.php" method="post">
                        <?php if($status_err['user exist']==true) echo '<p id="wr"><b>Пользователь с данным именем уже существует</p>'; ?>
                        <h2 style="text-align: center">Регистрация</h2>
                        <div class="b_act">
                        <p> Имя пользователя(от 5 до 20 символов, только буквы латинского алфавита)</p>
                        <input type="text" name="username_reg" required pattern="[a-zA-Z0-9]{5,20}">
                        <p>Введите адресс e-mail</p><br>
                        <input type="email" name="soap"><br>
                        <p>Пароль(от 8 до 20 символов, только буквы латинского алфавита)</p>
                        <?php if($status_err['wr conf']==true) echo '<p id="wr"><b>Пароли не совпадают</b></p>'; ?>
                        <input type="password" name="pass-conf" required pattern="[a-zA-Z0-9]{8,20}"><br>
                        <!--        <p style="text-align: left" class="button"> <button>Вход</button>       <button>Регистрация</button></p>>-->
                        <p>Подтвердите пароль</p>
                        <input type="password" name="pass+conf" required pattern="[a-zA-Z0-9]{8,20}">
                        <br><br>

                        <input  type="submit" name="action" value="Регистрация" />
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </body>
</html>
    <?php
        //TODO: вывод пароли не совпадают и пользователь существует одновременно done!
        //вывод пароли не совпадают done
        //исправление id wr на class
        //добавить class cor