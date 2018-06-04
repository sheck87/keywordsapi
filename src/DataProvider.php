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
     * List all categories
     *
     * @return array
     */
    abstract public function categories():array;
    
    /**
     * Count keywords in category
     *
     * @param string $category
     *
     * @return int
     */
    abstract public function countKeywordsInCategory(string $category):int;
    
    /**
     * DataProvider type
     *
     * @return string
     */
    public function type():string
    {
        return $this->config['engine'];
    }
    
    /**
     * @param string $key
     * @param null $default
     *
     * @return mixed
     */
    protected function getConfigParam(string $key, $default = null)
    {
        return $this->config['db'][$this->config_key][$key] ?? $default;
    }
}