<?php

namespace KeywordAPI;

use Exception;

class KeywordsRepository
{
    /**
     * @var array
     */
    private $config;
    
    /**
     * @var DataProvider
     */
    private $dataProvider;
    
    /**
     * KeywordsRepository constructor.
     *
     * @param array $config
     * @param DataProvider $dataProvider
     */
    public function __construct(array $config, DataProvider $dataProvider)
    {
        $this->config = $config;
        $this->dataProvider = $dataProvider;
    }
    
    /**
     * @param $category
     *
     * @return bool
     * @throws Exception
     */
    public function categoryExists($category): bool
    {
        return $this->dataProvider->categoryExists($category);
    }
    
    /**
     * @param string $category
     * @param int $count
     * @param null|string $contains
     *
     * @return array
     */
    public function getKeywords(string $category, int $count = -1, $contains = null): array
    {
        $keywords = $this->dataProvider->getKeywords($category, $count, $contains);
        
        return $keywords;
    }
}