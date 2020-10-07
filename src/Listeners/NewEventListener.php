<?php namespace professionalweb\IntegrationHub\SendData\Providers;

use professionalweb\IntegrationHub\SendData\Interfaces\SendDataSubsystem;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\EventData;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Events\EventToProcess;

class NewEventListener
{
    /**
     * @var SendDataSubsystem
     */
    private $sendDataSubsystem;

    public function __construct(SendDataSubsystem $sendDataSubsystem)
    {
        $this->setSendDataSubsystem($sendDataSubsystem);
    }

    public function handle(EventToProcess $eventToProcess): EventData
    {
        return $eventToProcess->getProcessOptions()->getSubsystemId() === SendDataSubsystem::SEND_DATA_SUBSYSTEM_ID ?
            $this->getSendDataSubsystem()
                ->setProcessOptions($eventToProcess->getProcessOptions())
                ->process($eventToProcess->getEventData()) :
            $eventToProcess->getEventData();
    }

    /**
     * @return SendDataSubsystem
     */
    public function getSendDataSubsystem(): SendDataSubsystem
    {
        return $this->sendDataSubsystem;
    }

    /**
     * @param SendDataSubsystem $sendDataSubsystem
     *
     * @return $this
     */
    public function setSendDataSubsystem(SendDataSubsystem $sendDataSubsystem): self
    {
        $this->sendDataSubsystem = $sendDataSubsystem;

        return $this;
    }
}