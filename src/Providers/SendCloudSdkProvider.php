<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2019-12-03
 * Time: 18:08
 */

namespace JoseChan\SendCloud\Sdk\Providers;


use Illuminate\Support\ServiceProvider;
use JoseChan\SendCloud\Sdk\SendCloud;

class SendCloudSdkProvider extends ServiceProvider
{
    public function boot()
    {

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $config = config("sdk");

        if(!$config){
            $config = include __DIR__.'../../config/sendcloud.php';
        }

        $this->app->when(SendCloud::class)
            ->needs('$config')
            ->give($config);

    }

    
}