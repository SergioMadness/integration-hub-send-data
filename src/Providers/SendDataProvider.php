<?php namespace professionalweb\IntegrationHub\SendData\Providers;

use Illuminate\Support\ServiceProvider;
use professionalweb\IntegrationHub\SendData\Services\SendData;
use professionalweb\IntegrationHub\SendData\Models\SendDataOptions;
use professionalweb\IntegrationHub\SendData\Interfaces\SendDataService;
use professionalweb\IntegrationHub\SendData\Services\SendDataSubsystem;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Services\SubsystemPool;
use professionalweb\IntegrationHub\SendData\Interfaces\SendDataSubsystem as ISendDataSubsystem;

class SendDataProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'IntegrationHubSendData');

        $this->app->booted(static function () {
            /** @var SubsystemPool $pool */
            $pool = app(SubsystemPool::class);
            $pool->register(trans('IntegrationHubSendData::common.send-data'), SendDataSubsystem::SEND_DATA_SUBSYSTEM_ID, new SendDataOptions());
        });
    }

    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);

        $this->app->singleton(SendDataService::class, SendData::class);
        $this->app->bind(ISendDataSubsystem::class, SendDataSubsystem::class);
    }
}