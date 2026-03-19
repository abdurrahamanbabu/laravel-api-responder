<?php 
namespace AbdurRahaman\LaravelApiResponder;
use Illuminate\Support\ServiceProvider;
class ApiResponderServiceProvider extends ServiceProvider{

    public function register()
    {
       $this->app->bind('api-responder',function($app){
          return new \AbdurRahaman\LaravelApiResponder\ApiResponder();
       });
    }

    public function boot()
    {
        require_once __DIR__.'/Helpers/helper.php';
    }

}