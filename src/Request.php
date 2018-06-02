<?php

namespace KeywordAPI;

/**
 * Class Request
 * @package KeywordAPI
 */
class Request
{
    /**
     * @return bool
     */
    public static function isPost(): bool
    {
        return static::getRequestMethod() === 'POST';
    }
    
    /**
     * @return string
     */
    public static function getRequestMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
    
    /**
     * @param string $key
     * @param null $default
     *
     * @return mixed|null
     */
    public static function get(string $key, $default = null)
    {
        $array = static::all();
        
        return $array[$key] ?? $default;
    }
    
    /**
     * @return string
     */
    public static function currentDomain(): string
    {
        return $_SERVER['HTTP_HOST'];
    }
    
    /**
     * @return array
     */
    public static function all():array
    {
        $array = [];
        
        switch (static::getRequestMethod()) {
            case 'POST':
                $array = $_POST;
                break;
            case 'GET':
                $array = $_GET;
                break;
            default:
                $array = [];
        }
        
        return $array;
    }
    
}