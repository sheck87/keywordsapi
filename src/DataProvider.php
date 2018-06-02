<?php

namespace KeywordAPI;

use Exception;

abstract class DataProvider
{
    /**
     * @var array
     */
    private $config;
    
    /**
     * @var string
     */
    protected $config_key;
    
    /**
     * DataProvider constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }
    
    /**
     * Check that category exists
     *
     * @param string $category
     *
     * @return bool
     */
    abstract public function categoryExists(string $category): bool;
    
    /**
     * Get keywords from database
     *
     * @param string $category
     * @param int $count
     * @param null|string $contains
     *
     * @return array
     */
    abstract public function getKeywords(string $category, int $count = -1, $contains = null): array;
    
    /**
     * @param string $key
     * @param null $default
     *
     * @return mixed
     * @throws Exception
     */
    protected function getConfigParam(string $key, $default = null)
    {
        if (empty($this->config_key)) {
            throw new Exception("Set `config_key` before call this methods!");
        }
        
        return $this->config['db'][$this->config_key][$key] ?? $default;
    }
}