<?php namespace professionalweb\IntegrationHub\SendData\Traits;

use professionalweb\IntegrationHub\SendData\Interfaces\SendDataService;

/**
 * Trait for classes use SendData service
 * @package professionalweb\IntegrationHub\SendData\Traits
 */
trait UseSendDataService
{
    /** @var SendDataService */
    private $sendDataService;

    /**
     * @return SendDataService
     */
    public function getSendDataService(): SendDataService
    {
        return $this->sendDataService;
    }

    /**
     * @param SendDataService $sendDataService
     *
     * @return static
     */
    public function setSendDataService(SendDataService $sendDataService): self
    {
        $this->sendDataService = $sendDataService;

        return $this;
    }
}