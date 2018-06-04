<?php

namespace KeywordAPI;

/**
 * Class Response
 */
class Response
{
    /**
     * @var string
     */
    private static $content = '';
    private static $content_type = ResponseType::HTML;
    
    /**
     * Redirect
     *
     * @param string $to
     * @param array $session
     */
    public static function redirect(string $to = '/', array $session = [])
    {
        foreach ($session as $k => $v) {
            Session::set($k, $v);
        }
        
        $folder = Config::instance()->get('folder');
        if (empty($folder)) {
            $delim = '/';
        } else {
            $delim = '/' . $folder . '/';
        }
        $url = Request::currentDomain() . $delim . ltrim($to, '/');
        $scheme = Request::getRequestScheme();
        header("Location: {$scheme}{$url}");
        die;
    }
    
    /**
     * @param string $content
     */
    public static function setContent(string $content = '')
    {
        static::$content = $content;
    }
    
    /**
     * @param string $content_type
     */
    public static function setContentType(string $content_type)
    {
        static::$content_type = $content_type;
    }
    
    /**
     * Send response to user
     *
     * @param int $response_code
     */
    public static function send(int $response_code = 200)
    {
        http_response_code($response_code);
        header('Content-Type: '. static::$content_type);
        echo static::$content;
        die;
    }
    
    /**
     * @param $data
     * @param int $code
     */
    public static function sendJSON($data, int $code = 200)
    {
        static::setContentType(ResponseType::JSON);
        if (is_array($data)) {
            $data = json_encode($data);
        }
        
        static::$content = $data;
        
        static::send($code);
    }
    
}