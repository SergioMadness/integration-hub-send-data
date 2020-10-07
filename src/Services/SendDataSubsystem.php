<?php namespace professionalweb\IntegrationHub\SendData\Services;

use professionalweb\IntegrationHub\SendData\Models\SendDataOptions;
use professionalweb\IntegrationHub\SendData\Traits\UseSendDataService;
use professionalweb\IntegrationHub\SendData\Interfaces\SendDataService;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\EventData;
use professionalweb\IntegrationHub\IntegrationHubCommon\Traits\HasProcessOptions;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\SubsystemOptions;
use professionalweb\IntegrationHub\SendData\Interfaces\SendDataSubsystem as ISendDataSubsystem;

/**
 * Subsystem to send data
 * @package professionalweb\IntegrationHub\SendData\Services
 */
class SendDataSubsystem implements ISendDataSubsystem
{
    use HasProcessOptions, UseSendDataService;

    public function __construct(SendDataService $sendDataService)
    {
        $this->setSendDataService($sendDataService);
    }

    /**
     * Get available options
     *
     * @return SubsystemOptions
     */
    public function getAvailableOptions(): SubsystemOptions
    {
        return new SendDataOptions();
    }

    /**
     * Process event data
     *
     * @param EventData $eventData
     *
     * @return EventData
     * @throws \Exception
     */
    public function process(EventData $eventData): EventData
    {
        $options = $this->getProcessOptions()->getOptions();
        if (!isset($options['url'], $options['method'])) {
            throw new \Exception('URL and method required');
        }
        $data = [
            'response' => $this->getSendDataService()->sendData($options['method'], $options['url'], $eventData->getData()),
        ];

        return $eventData->setData($data);
    }
}