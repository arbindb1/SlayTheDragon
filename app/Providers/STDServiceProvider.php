<?php

namespace App\Providers;

use App\Interfaces\DurationDeadlineServiceInterface;
use App\Interfaces\NextQuestionServiceInterface;
use App\Interfaces\StartTrialServiceInterface;
use App\Interfaces\TrialRepositoryInterface;
use App\Repository\TrialRepository;
use App\Services\DurationDeadlineService;
use App\Services\NextQuestionService;
use App\Services\TrialRoundServices\StartTrialService;
use Illuminate\Support\ServiceProvider;

class STDServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(DurationDeadlineServiceInterface::class,DurationDeadlineService::class);
        $this->app->singleton(NextQuestionServiceInterface::class,NextQuestionService::class);
        $this->app->singleton(StartTrialServiceInterface::class,StartTrialService::class);
        $this->app->singleton(TrialRepositoryInterface::class,TrialRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
