<?php

namespace App\Providers;


use App\Contracts\ApplicationContact;
use App\Contracts\CategoryContact;
use App\Contracts\FavoriteContract;
use App\Contracts\SongContact;
use App\Contracts\UserContract;
use App\Repositories\ApplicationRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\FavoriteRepository;
use App\Repositories\SongRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     * Laravel contractlarımızı, Repositer ile bind ettik. Böylelikle örneğin  UserContract'ı kullandığımızda
     * aslında UserRepository örneğine erişebileceğiz
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserContract::class, UserRepository::class);
        $this->app->bind(CategoryContact::class, CategoryRepository::class);
        $this->app->bind(SongContact::class, SongRepository::class);
        $this->app->bind(FavoriteContract::class, FavoriteRepository::class);
        $this->app->bind(ApplicationContact::class, ApplicationRepository::class);
    }
}
