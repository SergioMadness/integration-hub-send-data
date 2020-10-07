<?php namespace professionalweb\IntegrationHub\SendData\Interfaces;

use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Services\Subsystem;

/**
 * Interface for send data subsystem
 * @package professionalweb\IntegrationHub\SendData\Interfaces
 */
interface SendDataSubsystem extends Subsystem
{
    public const SEND_DATA_SUBSYSTEM_ID = 'send-data';
}