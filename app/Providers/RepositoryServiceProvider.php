<?php

namespace App\Providers;

use App\Repository\SongRepositoryInterface;
use App\Repository\Eloquent\SongRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SongRepositoryInterface::class, SongRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
