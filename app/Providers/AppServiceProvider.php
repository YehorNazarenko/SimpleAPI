<?php

namespace App\Providers;

use App\Repositories\SubmissionRepository;
use App\Repositories\SubmissionRepositoryInterface;
use App\Services\SubmissionService;
use App\Services\SubmissionServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private const SERVICES = [
        SubmissionServiceInterface::class => SubmissionService::class,
    ];

    private const REPOSITORIES = [
        SubmissionRepositoryInterface::class => SubmissionRepository::class,
    ];

    public function register(): void
    {
        foreach (self::SERVICES as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }

        foreach (self::REPOSITORIES as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }

    public function boot(): void
    {
        //
    }
}
