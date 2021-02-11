<?php

namespace App\Providers;

use App\Http\Resources\UserResource;
use App\Respostroy\InterfaceUser;
use App\Respostroy\UserRespostroy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);

        $this->app->bind(InterfaceUser::class , UserRespostroy::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
