<?php namespace professionalweb\IntegrationHub\SendData\Providers;

use Illuminate\Support\ServiceProvider;
use professionalweb\IntegrationHub\SendData\Services\SendData;
use professionalweb\IntegrationHub\SendData\Interfaces\SendDataService;
use professionalweb\IntegrationHub\SendData\Services\SendDataSubsystem;
use professionalweb\IntegrationHub\SendData\Interfaces\SendDataSubsystem as ISendDataSubsystem;

class SendDataProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);
    }

    public function boot(): void
    {
        $this->app->singleton(SendDataService::class, SendData::class);
        $this->app->bind(ISendDataSubsystem::class, SendDataSubsystem::class);
    }
}