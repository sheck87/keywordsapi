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
}