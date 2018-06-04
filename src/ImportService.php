<?php

namespace KeywordAPI;

use Exception;

/**
 * Class ImportService
 * @package KeywordAPI
 */
class ImportService
{
    /**
     * @var DataProvider
     */
    private $dataProvider;
    
    /**
     * ImportService constructor.
     *
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }
    
    /**
     * Import keywords
     *
     * @param string $type
     *
     * @throws Exception
     */
    public function import(string $type)
    {
        switch ($type) {
            case 'file':
                $this->importFromFile();
                break;
        }
    }
    
    /**
     * Import keywords from uploaded file
     * @throws Exception
     */
    public function importFromFile()
    {
        if (!isset($_FILES['file'])) {
            throw new Exception("Нужно выбрать файл");
        }
        
        if (!is_uploaded_file($_FILES['file']['tmp_name'])) {
            throw new Exception("Что-то не так с загруженным файлом");
        }
    
        throw new Exception("Что-то не так с загруженным файлом");
    }
}