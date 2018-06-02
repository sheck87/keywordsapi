<?php

namespace KeywordAPI;

use Exception;

/**
 * Class DataProviderFactory
 * @package KeywordAPI
 */
class DataProviderFactory
{
    /**
     * @param array $config
     *
     * @return DataProvider
     * @throws Exception
     */
    public function make(array $config): DataProvider
    {
        $data_provider = null;
        
        switch ($config['engine']) {
            case 'file':
                $data_provider = new FileDataProvider($config);
                break;
            default:
                throw new Exception("Could not find data provider for '{$config['engine']}'");
        }
        
        return $data_provider;
    }
}