<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // View::composer(
        //     [
        //         'compliments.create', 
        //         'surveys.create', 
        //         'complaints.create', 
        //         'compliments.createTransport',
        //         'complaints.createTransport'
        //     ], 'App\Http\ViewComposers\HospitalComposer'
        // );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
