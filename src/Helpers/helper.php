<?php 
use AbdurRahaman\LaravelApiResponder\ApiResponder;
if(!function_exists('responder')){

    function responder(): ApiResponder {
        return app('api-responder');
    }

}