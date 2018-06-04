<?php

namespace KeywordAPI;

use Exception;
use SplFileObject;

/**
 * Class FileDataProvider
 * @package KeywordAPI
 */
class FileDataProvider extends DataProvider
{
    /**
     * @var string
     */
    protected $config_key = 'file';
    
    /**
     * Check that category exists
     *
     * @param string $category
     *
     * @return bool
     */
    public function categoryExists(string $category): bool
    {
        $category_path = $this->makePath($category);
        
        return is_dir($category_path);
    }
    
    /**
     * Get keywords from database
     *
     * @param string $category
     * @param int $count
     * @param null|string $contains
     *
     * @return array
     */
    public function getKeywords(string $category, int $count = -1, $contains = null): array
    {
        $keywords = [];
        $category_path = $this->makePath($category);
        $files = glob($category_path . '/*.txt');
        shuffle($files);
    
        foreach ($files as $file) {
            $lines = file($file);
            $lines = array_map('trim', $lines);
        
            if (!empty($contains)) {
                $lines = array_filter($lines, function ($line) use ($contains) {
                    return strpos($line, $contains) !== false;
                });
            }
        
            shuffle($lines);
        
            $slice = array_slice($lines, 0, $count);
            $keywords = empty($keywords) ? $slice : array_merge($keywords, $slice);
        
            if ($count > 0 && count($lines) < $count) {
                $count -= count($lines);
                continue;
            }
        
            break;
        }
    
        return $keywords;
    }
    
    /**
     * List all categories
     *
     * @return array
     */
    public function categories(): array
    {
        $path = $this->makePath();
        $dirs = glob($path . '/*', GLOB_ONLYDIR);
        return array_map(function ($dir) {
            return basename($dir);
        }, $dirs);
    }
    
    /**
     * Count keywords in category
     *
     * @param string $category
     *
     * @return int
     */
    public function countKeywordsInCategory(string $category): int
    {
        $path = $this->makePath($category);
        $files = glob($path . '/*.txt');
        $total_count = 0;
        foreach ($files as $file) {
            $f = new SplFileObject($file, 'r');
            $f->seek(PHP_INT_MAX);
            $total_count += $f->key() + 1;
        }
        
        return (int)$total_count;
    }
    
    /**
     * @param string $path
     *
     * @return string
     */
    private function makePath(string $path = ''): string
    {
        $db_path = $this->getConfigParam('dir');
        
        return realpath($db_path . '/'. $path);
    }
}