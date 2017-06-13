<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 12.06.2017
 * Time: 21:10
 */

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', 'App\Http\ViewComposers\InviteComposer');
    }

    public function register()
    {
        // TODO: Implement register() method.
    }
}