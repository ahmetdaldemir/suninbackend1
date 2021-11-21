<?php

namespace Salman\RepositoryPattern\Service;
use Illuminate\Support\Facades\Artisan;



class RepositoryService {

    protected static function getStubs($type)
    {
        return file_get_contents(resource_path("vendor/salmanzafar/stubs/$type.stub"));
    }

    public static function ImplementNow($name,$category)
    {
        if (!file_exists($path=base_path('/app/Repositories')))
            mkdir($path, 0777, true);

        if (!file_exists($path=base_path('/app/Repositories/'.$category.'/'.$name.'')))
            mkdir($path, 0777, true);

        self::MakeProvider();
        self::MakeInterface($name,$category);
        self::MakeModelClass($name);
        self::MakeRepositoryClass($name,$category);
        self::MakeControllerClass($name,$category);
    }


    protected static function MakeInterface($name,$category)
    {
        $template = str_replace(
            ['{{modelName}}','{{categoryName}}'],
            [$name,$category],
            self::GetStubs('RepositoryInterface')
        );

        file_put_contents(base_path("/app/Repositories/{$category}/{$name}RepositoryInterface.php"), $template);

    }

    protected static function MakeRepositoryClass($name,$category)
    {
        $template = str_replace(
            ['{{modelName}}','{{categoryName}}'],
            [$name,$category],
            self::GetStubs('Repository')
        );

        file_put_contents(base_path("/app/Repositories/{$category}/{$name}Repository.php"), $template);

    }

    protected static function MakeProvider()
    {
        $template =  self::getStubs('RepositoryBackendServiceProvider');

        if (!file_exists($path=base_path('/app/Repositories/RepositoryBackendServiceProvider.php')))
            file_put_contents(base_path('/app/Repositories/RepositoryBackendServiceProvider.php'), $template);
    }


    protected static function MakeControllerClass($name,$category)
    {
        $template = str_replace(
            ['{{modelName}}','{{categoryName}}'],
            [$name,$category],
            self::GetStubs('Controller')
        );
        file_put_contents(base_path("/app/Http/Controllers/{$category}/{$name}Controller.php"), $template);
    }

    protected static function MakeModelClass($name)
    {
        $template = str_replace(
            ['{{modelName}}'],
            [$name],
            self::GetStubs('Model')
        );
        file_put_contents(base_path("/app/Models/{$name}.php"), $template);
        Artisan::call('make:migration '.$name.'');
    }
}
