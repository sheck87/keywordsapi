<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd8833ee2628665858fca0781c144ebc1
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
        'K' => 
        array (
            'KeywordAPI\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
        'KeywordAPI\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'KeywordAPI\\AuthService' => __DIR__ . '/../..' . '/src/AuthService.php',
        'KeywordAPI\\Controllers\\AdminController' => __DIR__ . '/../..' . '/src/Controllers/AdminController.php',
        'KeywordAPI\\Controllers\\BaseController' => __DIR__ . '/../..' . '/src/Controllers/BaseController.php',
        'KeywordAPI\\DataProvider' => __DIR__ . '/../..' . '/src/DataProvider.php',
        'KeywordAPI\\DataProviderFactory' => __DIR__ . '/../..' . '/src/DataProviderFactory.php',
        'KeywordAPI\\Exceptions\\AuthException' => __DIR__ . '/../..' . '/src/Exceptions/AuthException.php',
        'KeywordAPI\\FileDataProvider' => __DIR__ . '/../..' . '/src/FileDataProvider.php',
        'KeywordAPI\\KeywordsRepository' => __DIR__ . '/../..' . '/src/KeywordsRepository.php',
        'KeywordAPI\\Request' => __DIR__ . '/../..' . '/src/Request.php',
        'KeywordAPI\\Response' => __DIR__ . '/../..' . '/src/Response.php',
        'KeywordAPI\\ResponseType' => __DIR__ . '/../..' . '/src/ResponseType.php',
        'KeywordAPI\\Session' => __DIR__ . '/../..' . '/src/Session.php',
        'League\\Plates\\Engine' => __DIR__ . '/..' . '/league/plates/src/Engine.php',
        'League\\Plates\\Extension\\Asset' => __DIR__ . '/..' . '/league/plates/src/Extension/Asset.php',
        'League\\Plates\\Extension\\ExtensionInterface' => __DIR__ . '/..' . '/league/plates/src/Extension/ExtensionInterface.php',
        'League\\Plates\\Extension\\URI' => __DIR__ . '/..' . '/league/plates/src/Extension/URI.php',
        'League\\Plates\\Template\\Data' => __DIR__ . '/..' . '/league/plates/src/Template/Data.php',
        'League\\Plates\\Template\\Directory' => __DIR__ . '/..' . '/league/plates/src/Template/Directory.php',
        'League\\Plates\\Template\\FileExtension' => __DIR__ . '/..' . '/league/plates/src/Template/FileExtension.php',
        'League\\Plates\\Template\\Folder' => __DIR__ . '/..' . '/league/plates/src/Template/Folder.php',
        'League\\Plates\\Template\\Folders' => __DIR__ . '/..' . '/league/plates/src/Template/Folders.php',
        'League\\Plates\\Template\\Func' => __DIR__ . '/..' . '/league/plates/src/Template/Func.php',
        'League\\Plates\\Template\\Functions' => __DIR__ . '/..' . '/league/plates/src/Template/Functions.php',
        'League\\Plates\\Template\\Name' => __DIR__ . '/..' . '/league/plates/src/Template/Name.php',
        'League\\Plates\\Template\\Template' => __DIR__ . '/..' . '/league/plates/src/Template/Template.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd8833ee2628665858fca0781c144ebc1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd8833ee2628665858fca0781c144ebc1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd8833ee2628665858fca0781c144ebc1::$classMap;

        }, null, ClassLoader::class);
    }
}
