<?php

namespace Chenhaitry\LaravelViewCommand\Provider;

use Chenhaitry\LaravelCommand\Console\Commands\MakeViewCommand;
use Chenhaitry\LaravelCommand\Console\Commands\ScrapViewCommand;
use Illuminate\Support\ServiceProvider as ServiceProvider;


class LaravelViewCommandServiceProvider extends ServiceProvider
{

    protected $commands = [
        MakeViewCommand::class,
        ScrapViewCommand::class,
    ];

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}
