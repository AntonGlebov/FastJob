<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'] . '/';

include $root . 'render.php';
include $root . 'config.php';

$module = isset($_GET['module']) ? $_GET['module'] : '';

switch ($module) {
    default:
    case 'main':
        $tpl = loadTpl('main.tpl');

        $tpl = str_replace('{BODY}', renderMain($DBH), $tpl);

        $tpl = str_replace('{LEFTMENU}', renderMenu($url), $tpl);
        $tpl = str_replace('{RIGHTMENU}', renderExit(), $tpl);
        $tpl = str_replace('{TITLE}', $siteName . ' - Главная', $tpl);
        $tpl = str_replace('{LOGO}', $siteName, $tpl);

        renderTpl($tpl);
        break;
    case 'vievad':
        $tpl = loadTpl('main.tpl');

        $tpl = str_replace('{BODY}', renderVievad($DBH, $_GET['id']), $tpl);

        $tpl = str_replace('{LEFTMENU}', renderMenu($url), $tpl);
        $tpl = str_replace('{RIGHTMENU}', renderExit(), $tpl);
        $tpl = str_replace('{TITLE}', $siteName . ' - Объявление', $tpl);
        $tpl = str_replace('{LOGO}', $siteName, $tpl);

        renderTpl($tpl);
        break;
    case 'profile':
        $tpl = loadTpl('main.tpl');

        $idUser = isset($_GET['idUser']) ? $_GET['idUser'] : 0;
        if (empty($idUser) && !empty($_SESSION['id'])) $idUser = $_SESSION['id'];

        $tpl = str_replace('{BODY}', renderProfile($DBH, $idUser), $tpl);

        $tpl = str_replace('{LEFTMENU}', renderMenu($url), $tpl);
        $tpl = str_replace('{RIGHTMENU}', renderExit(), $tpl);
        $tpl = str_replace('{TITLE}', $siteName . ' - Профиль', $tpl);
        $tpl = str_replace('{LOGO}', $siteName, $tpl);

        renderTpl($tpl);
        break;
    case 'deletead':
        $tpl = loadTpl('main.tpl');

        $idUser = isset($_SESSION['id']) ? $_SESSION['id'] : 0;
        $ad = isset($_GET['id']) ? $_GET['id'] : 0;

        $tpl = str_replace('{BODY}', renderDetele($DBH, $idUser, $ad), $tpl);

        $tpl = str_replace('{LEFTMENU}', renderMenu($url), $tpl);
        $tpl = str_replace('{RIGHTMENU}', renderExit(), $tpl);
        $tpl = str_replace('{TITLE}', $siteName . ' - Удаление', $tpl);
        $tpl = str_replace('{LOGO}', $siteName, $tpl);

        renderTpl($tpl);
        break;
    case 'leave':
        $tpl = loadTpl('main.tpl');

        $tpl = str_replace('{BODY}', renderLeave(), $tpl);

        $tpl = str_replace('{LEFTMENU}', renderMenu($url), $tpl);
        $tpl = str_replace('{RIGHTMENU}', renderExit(), $tpl);
        $tpl = str_replace('{TITLE}', $siteName . ' - Удаление', $tpl);
        $tpl = str_replace('{LOGO}', $siteName, $tpl);


        renderTpl($tpl);
        break;
    case 'login':
        $tpl = loadTpl('main.tpl');

        $tpl2 = isset($_GET['action']) ? renderAuth($DBH) : loadTpl('login.tpl');

        $tpl = str_replace('{BODY}', $tpl2, $tpl);

        $tpl = str_replace('{LEFTMENU}', renderMenu($url), $tpl);
        $tpl = str_replace('{RIGHTMENU}', renderExit(), $tpl);
        $tpl = str_replace('{TITLE}', $siteName . ' - Вход', $tpl);
        $tpl = str_replace('{LOGO}', $siteName, $tpl);

        renderTpl($tpl);
        break;
    case 'send_ad':
        $tpl = loadTpl('main.tpl');

        $tpl2 = isset($_GET['action']) ? renderSend_ad($DBH) : loadTpl('ad.tpl');

        $tpl = str_replace('{BODY}', $tpl2, $tpl);

        $tpl = str_replace('{LEFTMENU}', renderMenu($url), $tpl);
        $tpl = str_replace('{RIGHTMENU}', renderExit(), $tpl);
        $tpl = str_replace('{TITLE}', $siteName . ' - Главная', $tpl);
        $tpl = str_replace('{LOGO}', $siteName, $tpl);

        renderTpl($tpl);
        break;
    case 'register':
        $tpl = loadTpl('main.tpl');
        $tpl2 = isset($_GET['action']) ? renderRegister($DBH) : loadTpl('register.tpl');

        $tpl = str_replace('{BODY}', $tpl2, $tpl);

        $tpl = str_replace('{LEFTMENU}', renderMenu($url), $tpl);
        $tpl = str_replace('{RIGHTMENU}', renderExit(), $tpl);
        $tpl = str_replace('{TITLE}', $siteName . ' - Регистрация', $tpl);
        $tpl = str_replace('{LOGO}', $siteName, $tpl);

        renderTpl($tpl);
        break;
}
