<?php namespace professionalweb\IntegrationHub\SendData\Providers;

use professionalweb\IntegrationHub\Supervisor\Listeners\NewRequestListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Events\NewRequest;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewRequest::class        => [
            NewRequestListener::class,
        ],
    ];
}
