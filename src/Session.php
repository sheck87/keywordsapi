<?php

namespace KeywordAPI;

/**
 * Class Session
 * @package KeywordAPI
 */
class Session
{
    /**
     * @param string $key
     * @param null $default
     *
     * @return null
     */
    public static function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }
    
    /**
     * @param string $key
     * @param $value
     */
    public static function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }
    
    /**
     * @param string $key
     *
     * @return bool
     */
    public static function has(string $key):bool
    {
        return !is_null(static::get($key, null));
    }
    
    /**
     * @param string $key
     *
     * @return mixed
     */
    public static function pull(string $key)
    {
        $val = static::get($key);
        unset($_SESSION[$key]);
        
        return $val;
    }
    
    /**
     * @param string $key
     */
    public static function del(string $key)
    {
        unset($_SESSION[$key]);
    }
    
    /**
     *
     */
    public static function destroy()
    {
        session_destroy();
    }
}