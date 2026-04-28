<?php

declare(strict_types=1);

namespace professionalweb\IntegrationHub\SendData\Models;

use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\SubsystemOptions;

/**
 * Subsystem options
 * @package professionalweb\IntegrationHub\SendData\Models
 */
class SendDataOptions implements SubsystemOptions
{


    /**
     * Get available fields for mapping
     */
    public function getAvailableFields(): array
    {
        return [
            'data',
        ];
    }

    /**
     * Get service settings
     */
    public function getOptions(): array
    {
        return [
            'url' => [
                'name' => 'Url',
                'type' => 'string',
            ],
            'method' => [
                'name' => 'HTTP method',
                'type' => 'string',
            ],
        ];
    }

    /**
     * Get array fields, that subsystem generates
     */
    public function getAvailableOutFields(): array
    {
        return [
            'response' => 'Response data',
        ];
    }
}