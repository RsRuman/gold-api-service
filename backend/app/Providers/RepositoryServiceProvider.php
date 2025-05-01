<?php

namespace App\Providers;

use App\Contracts\Auth\AuthenticationRepositoryInterface;
use App\Repositories\Auth\AuthenticationRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthenticationRepositoryInterface::class, AuthenticationRepository::class);
    }
}
