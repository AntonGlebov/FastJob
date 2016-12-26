<?php

function loadTpl($name = null)
{
    $tpl = '';

    if (!empty($name)) {
        $folderTpl = $_SERVER['DOCUMENT_ROOT'] . '/template/';
        $tpl = file_get_contents($folderTpl . $name);
    }

    return $tpl;
}

function renderTpl($tpl = null)
{
    echo $tpl;
}

/*
1 - показать только автор.
2 - показать только гостям
*/
function renderMenu($arr = [], $side = 'left')
{
    $menu = '';

    if (!empty($arr)) {
        $levelUser = isset($_SESSION['auth']) && $_SESSION['auth'] == true ? 1 : 2;

        $menu .= $side == 'left' ? '<ul class="nav navbar-nav">' : '<ul class="nav navbar-nav navbar-right\">';
        foreach ($arr as $key => $value) {
            if (isset($value['auth']) && $value['auth'] == $levelUser || !isset($value['auth']))
                $menu .= "<li><a href=" . $value['url'] . ">" . $value['name'] . "</a></li>";
        }
        $menu .= "</ul>";
    }

    return $menu;
}

function renderMain($DBH = null)
{
    $main = '';

    if (!empty($DBH)) {
        $sth = $DBH->prepare("SELECT * FROM `job` ORDER BY id DESC");
        $sth->execute();

        $result = $sth->fetchAll();
        foreach ($result as $row) {

            $main .= '<div class="panel panel-primary">';
            $main .= '<div class="panel-heading">';
            $main .= '<div class="row">';
            $main .= '<div class="col-md-6"> <b>' . $row['title'] . '</b> <span class="badge">' . $row['price'] . ' руб.</span> </div>';
            $main .= '<div class="col-md-6 text-right"><i>' . $row['address'] . '</i></div>';
            $main .= '</div></div>';
            $main .= '<div class="panel-body">';
            $main .= '<p>' . $row['desc'] . '</p>';
            $main .= '<div class="row">';
            $main .= '<div class="col-sm-6">';
            $main .= 'Дата: ' . $row['date'];
            $main .= '</div>';
            $main .= '<div class="col-sm-6">';
            $main .= '<p class="text-right">Просмотров: ' . $row['views'] . '</p>';
            $main .= '</div>';
            $main .= '</div>';
            $main .= '<a href="?module=vievad&id=' . $row['id'] . '"><button  role="button" class="btn btn-success center-block">Подробнее</button></a>';
            $main .= '</div>';
            $main .= '</div>';

        }

    }

		echo "<center><h3>Актуальные предложения о работе</h3></center>";
	
    return $main;
}

function renderVievad($DBH = null, $id = 0)
{
    $ad = '';

    if (!empty($DBH) && is_numeric($id)) {
        $sth = $DBH->prepare("SELECT * FROM `job` WHERE `id` = :id");
        $sth->bindParam(':id', $id);
        $sth->execute();

        $result = $sth->fetch();

        if (empty($result)) return $ad .= '<h1><center>Объявление не найдено</center></h1>';

        $ad .= '<h1>' . $result['title'] . '</h1>';
        $ad .= '<p>' . $result['desc'] . '</p>';
        $ad .= '<div class="row">';
        $ad .= '<div class="col-sm-4">';
        $ad .= '<a href="?module=profile&idUser=' . $result['idUser'] . '"><button  role="button" class="btn btn-default">Профиль работодателя</button></a>';
        $ad .= '</div>';
        $ad .= '<div class="col-sm-4">';
        $ad .= '<span class="badge">' . $result['price'] . ' руб.</span> - <i>' . $result['address'] . '</i>';
        $ad .= '</div>';
        $ad .= '<div class="col-sm-4">';
        $ad .= 'Просмотров: ' . $result['views'] . ' <i>(' . $result['date'] . ')</i>';
        $ad .= '</div>';
        $ad .= '</div>';


        $sth = $DBH->prepare("UPDATE `job` SET views = views + 1 WHERE `id` = :id");
        $sth->bindParam(':id', $id);
        $sth->execute();

    }

    return $ad;
}

function renderProfile($DBH = null, $idUser = 0)
{
    $profile = '';

    if (!empty($DBH) && is_numeric($idUser)) {
        $sth = $DBH->prepare("SELECT * FROM `user` WHERE `id` = :id");
        $sth->bindParam(':id', $idUser);
        $sth->execute();

        $result = $sth->fetch();

        if (empty($result)) return $profile .= 'НЕТ ПРОФИЛЯ';
        $profile .= '<center><h2>Профиль</h2></center>';
        $profile .= '<br><b>Имя</b>: ' . $result['firstname'];
        $profile .= '<br><b>Телефон</b>: ' . $result['phone'];
        //$profile .= '<br><b>Рейтинг</b>: ' . $result['rep'];
        $profile .= '<br><b>Создано объявлений:</b> ' . $result['adSum'];
        $profile .= '<br><b>Дата регистрации</b>: ' . $result['date'] . '<br>';
		$profile .= '<center><br><h4>Действующие объявления</h4></center>';


        $sth = $DBH->prepare("SELECT * FROM `job` WHERE `idUser` = :id ORDER BY id DESC");
        $sth->bindParam(':id', $idUser);
        $sth->execute();

        $result = $sth->fetchAll();
        foreach ($result as $row) {

            $profile .= '<div class="panel panel-primary">';
            $profile .= '<div class="panel-heading">';
            $profile .= '<div class="row">';
            $profile .= '<div class="col-md-6"> <b>' . $row['title'] . '</b> <span class="badge">' . $row['price'] . ' руб.</span> </div>';
            $profile .= '<div class="col-md-6 text-right"><i>' . $row['address'] . '</i></div>';
            $profile .= '</div></div>';
            $profile .= '<div class="panel-body">';
            $profile .= '<p>' . $row['desc'] . '</p>';
            $profile .= '<div class="row">';
            $profile .= '<div class="col-sm-6">';
            $profile .= 'Дата: ' . $row['date'];
            $profile .= '</div>';
            $profile .= '<div class="col-sm-6">';
            $profile .= '<p class="text-right">Просмотров: ' . $row['views'] . '</p>';
            $profile .= '</div>';
            $profile .= '</div>';
            if (isset($_SESSION['id']) && $idUser == $_SESSION['id']) $profile .= '<div class="text-center"><div class="btn-group" role="group">';
            //<button type="button" class="btn btn-secondary">Left</button>
            if (isset($_SESSION['id']) && $idUser == $_SESSION['id']) $profile .= '<a href="?module=deletead&id=' . $row['id'] . '"><button  role="button" class="btn btn-danger">Удалить</button></a>    ';
           // if (isset($_SESSION['id']) && $idUser == $_SESSION['id']) $profile .= '<a href="?module=edit&id=' . $row['id'] . '"><button  role="button" class="btn btn-success">Редактировать</button></a>';

            if (isset($_SESSION['id']) && $idUser == $_SESSION['id']) $profile .= '</div></div>';
            $profile .= '</div>';
            $profile .= '</div>';

        }

    }

    return $profile;
}

function renderDetele($DBH, $idUser, $ad)
{
    $result = '';
    $sth = $DBH->prepare("DELETE FROM `job` WHERE idUser = :idUser AND id = :idAd LIMIT 1");
    $sth->bindParam(':idUser', $idUser);
    $sth->bindParam(':idAd', $ad);
    $sth->execute();

    if ($sth->rowCount() > 0)
        $result = 'Удалено.';
    else $result = 'Не удалено.';

    return $result;

}

function renderExit()
{
    $message = '';
    if (isset($_SESSION['auth']) && $_SESSION['auth'] == true) {

        $message .= '<ul class="nav navbar-nav navbar-right">';
        $message .= '<li><a href="?module=leave">Выход</a></li>';
        $message .= '</ul>';

    } else {
        $message .= '<ul class="nav navbar-nav navbar-right">';
        $message .= '<li><a href="?module=login">Вход</a></li>';
        $message .= '</ul>';
    }
    return $message;
}

function renderLeave()
{
    $message = '';
    if (isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
        unset($_SESSION['username']);
        unset($_SESSION['firstname']);
        unset($_SESSION['id']);
        unset($_SESSION['auth']);

        return $message = 'Вы успешно вышли.';
    }
    return $message = 'Ошибка выхода.';
}

function renderAuth($DBH = null)
{
    $message = '';
    if ($sth = $DBH->prepare("SELECT * FROM `user` WHERE username = :username AND password = :password")) {

        $sth->bindParam(':username', $_POST['username']);
        $sth->bindParam(':password', $_POST['password']);

        $sth->execute();

        if ($res = $sth->fetch()) {
            $_SESSION['username'] = $res['username'];
            $_SESSION['firstname'] = $res['firstname'];
            $_SESSION['id'] = $res['id'];
            $_SESSION['auth'] = true;
            return $message = "Вы успешно вошли.";
        } else {
            return $message = "Ошибка входа.";
        }

    }
}

function renderSend_ad($DBH = null)
{
    $message = '';

    try {
        $sth = $DBH->prepare("INSERT INTO `job` (`title`, `desc`, `price`, `address`, `idUser`) VALUES (:title, :desc, :price, :address, :idUser)");

        $sth->bindParam(':title', $_POST['jobTitle']);
        $sth->bindParam(':desc', $_POST['jobDesc']);
        $sth->bindParam(':price', $_POST['jobPrice']);
        $sth->bindParam(':address', $_POST['jobAddress']);
        $sth->bindParam(':idUser', $_SESSION['id']);

        if ($sth->execute()) {
            $sth = $DBH->prepare("UPDATE `user` SET `adSum` = adSum + 1 WHERE `id` = :id");
            $sth->bindParam(":id", $_SESSION['id']);
            $sth->execute();
        }

        $message .= 'Объявление успешно добавлено.';
    } catch (EPDOException $e) {
        $message .= 'Объявление не добавлено' . $e->getMessage();
    }

    return $message;
}

function clean($value = "")
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}

function check_length($value = "", $min, $max)
{
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}

function renderRegister($DBH = null)
{
    $message = '';
    if (empty($_POST['username'])) return $message .= ('Не указан username');
    if (empty($_POST['password'])) return $message .= ('Не указан password');
    if (empty($_POST['password2'])) return $message .= ('Не указан password2');
    if (empty($_POST['firstname'])) return $message .= ('Не указан firstname');
    if (empty($_POST['phone'])) return $message .= ('Не указан phone');

    $username = clean($_POST['username']);
    $password = clean($_POST['password']);
    $password2 = clean($_POST['password2']);
    $firstname = clean($_POST['firstname']);
    $phone = clean($_POST['phone']);

    if (!preg_match("/^[a-zA-Z0-9]/", $username)) return $message .= ("Логин должен состоять только из латинских букв");
    if (!check_length($username, 4, 15)) return $message .= ("Слишком короткий (4) или длиный (15) логин.");
    if ($password != $password2)  return $message .= ("Пароли не совпадают.");


    try {
        $stmt = $DBH->prepare("SELECT * FROM `user` WHERE username = :username LIMIT 1");
        $stmt->execute([':username' => $username]);
        if($stmt->fetch()) return $message .= 'Пользователь с логином '.$username.' уже есть на сайте.';

        $stmt = $DBH->prepare("INSERT INTO `user` (`username`, `password`, `firstname`, `phone`) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $password, $firstname, $phone]);
        $message .= 'Вы успешно зарегистрировались. Теперь можно <a href="?module=login">Войти</a> на сайт.';
    } catch (EPDOException $e) {
        $message .= 'Ошибка регистрации.' . $e->getMessage();
    }

    return $message;
}
