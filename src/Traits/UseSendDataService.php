<?php

declare(strict_types=1);

namespace professionalweb\IntegrationHub\SendData\Traits;

use professionalweb\IntegrationHub\SendData\Interfaces\SendDataService;

/**
 * Trait for classes use SendData service
 * @package professionalweb\IntegrationHub\SendData\Traits
 */
trait UseSendDataService
{
    private SendDataService $sendDataService;

    public function getSendDataService(): SendDataService
    {
        return $this->sendDataService;
    }

    /**
     * @return static
     */
    public function setSendDataService(SendDataService $sendDataService): self
    {
        $this->sendDataService = $sendDataService;

        return $this;
    }
}