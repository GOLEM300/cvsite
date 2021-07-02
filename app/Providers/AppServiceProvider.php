<?php

namespace App\Providers;

use App\Repositories\BusynessInterface;
use App\Repositories\BusynessRepository;
use App\Repositories\CvQueriesInterface;
use App\Repositories\CvRepository;
use App\Repositories\PrevWorksInterface;
use App\Repositories\PrevWorksRepository;
use App\Repositories\SheduleTypeInterface;
use App\Repositories\SheduleTypeRepository;
use App\Repositories\SpecializationsInterface;
use App\Repositories\SpecializationsRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CvQueriesInterface::class,
            CvRepository::class
        );
        $this->app->bind(
            PrevWorksInterface::class,
            PrevWorksRepository::class
        );
        $this->app->bind(
            SpecializationsInterface::class,
            SpecializationsRepository::class
        );
        $this->app->bind(
            BusynessInterface::class,
            BusynessRepository::class
        );
        $this->app->bind(
            SheduleTypeInterface::class,
            SheduleTypeRepository::class
        );
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
