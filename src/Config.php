<?php

namespace KeywordAPI;

/**
 * Class Config
 * @package KeywordAPI
 */
class Config
{
    /**
     * @var array
     */
    private $config = [];
    
    /**
     * @var Config
     */
    private static $_instance;
    
    /**
     * Config constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }
    
    /**
     * @return Config
     */
    public static function instance(): Config
    {
        if (is_null(static::$_instance)) {
            $config = include_once ROOT_DIR . '/config.php';
            static::$_instance = new self($config);
        }
        
        return static::$_instance;
    }
    
    /**
     * @return array
     */
    public function getConfig():array
    {
        return (array)$this->config;
    }
    
    /**
     * @param string $key
     * @param null $default
     *
     * @return mixed|null
     */
    public function get(string $key, $default = null)
    {
        return $this->config[$key] ?? $default;
    }
}