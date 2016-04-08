<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //自定义表单验证规则
        Validator::extend('phone',function($attribute, $value, $parameters){

            $reg = "/^0?(13[0-9]|15[0-9]|17[0-9]|14[0-9]|18[0-9])[0-9]{8}$/";
            $res = preg_match($reg, $value);
            return $res;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
