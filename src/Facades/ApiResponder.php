<?php 
namespace AbdurRahaman\LaravelApiResponder\Facades;

use Illuminate\Support\Facades\Facade;

class ApiResponder extends Facade{

    /**
     * @see \AbdurRahaman\ApiResponder\AbdurRahaman\ApiResponder
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'api-responder';
    }

}