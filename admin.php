<?php

use KeywordAPI\AuthService;
use KeywordAPI\Config;
use KeywordAPI\DataProviderFactory;
use KeywordAPI\ImportService;
use KeywordAPI\Request;
use KeywordAPI\Response;
use KeywordAPI\Session;

require_once 'init.php';

$te = new \League\Plates\Engine(Config::instance()->get('templates')['dir']);
$te->addFolder('admin', Config::instance()->get('templates')['dir'] . '/admin');

$as = new AuthService;
$df = new DataProviderFactory;
$dp = $df->make(Config::instance()->getConfig());


$action = Request::get('action');
$method = Request::getRequestMethod();
$content = '';

if ($as->guest() && $action !== 'login') {
    Response::redirect('admin.php?action=login', ['error' => 'Вам сюда нельзя']);
}

switch ($action) {
    case 'login':
        if (Request::isPost()) {
            if ($as->authenticate(Request::get('login'), Request::get('password'))) {
                Response::redirect('admin.php');
            } else {
                Response::redirect('admin.php?action=login', ['error' => 'Неправильные логин или пароль']);
            }
        } else {
            $content = $te->render('admin::login', ['errors' => [Session::pull('error')]]);
        }
        break;
    case 'logout':
        if (Request::isPost()) {
            $as->logout();
    
            Response::sendJSON(['success' => true]);
        }
        break;
    case 'import':
        if (Request::isPost()) {
            $type = Request::get('type');
            $im = new ImportService($dp);
            try
            {
                $im->import($type);
            } catch (Exception $e) {
                Response::redirect('admin.php?action=import', ['error' => $e->getMessage()]);
            }
        } else {
            $categories = $dp->categories();
            $content = $te->render('admin::import', compact('categories'));
        }
        break;
    default:
        $content = $te->render('admin::index', ['dataProvider' => $dp]);
}

Response::setContent($content);
Response::send();