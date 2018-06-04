<?php

require_once 'init.php';

use KeywordAPI\Config;
use KeywordAPI\DataProviderFactory;
use KeywordAPI\KeywordsRepository;
use KeywordAPI\Request;
use KeywordAPI\Response;

if (Request::isPost() === false) {
    Response::setContent('<h1>404 Not Found</h1>');
    Response::send(404);
}

$config = Config::instance()->getConfig();

try
{
    $key = Request::get('key');
    
    if (empty($key) || $key !== $config['auth']['api']) {
        Response::sendJSON(['success' => false, 'message' => 'API key is invalid'], 403);
    }
    
    $category = Request::get('category', $config['default_category']);
    $count = (int)Request::get('count', -1);
    $contains = Request::get('contains');
    
    $factory = new DataProviderFactory;
    $ks = new KeywordsRepository($config, $factory->make($config));
    
    if (!$ks->categoryExists($category)) {
        Response::sendJSON(['success' => false, 'message' => 'Category not found'], 400);
    }
    
    $keywords = $ks->getKeywords($category, $count, $contains);
    
    Response::sendJSON(['success' => true, 'data' => $keywords]);
} catch (Exception $e) {
    Response::sendJSON(['success' => false, 'message' => $e->getMessage()], 500);
}