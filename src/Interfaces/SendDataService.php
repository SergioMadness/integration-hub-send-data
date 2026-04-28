<?php

declare(strict_types=1);

namespace professionalweb\IntegrationHub\SendData\Interfaces;

/**
 * Interface for service to send data to url
 * @package professionalweb\IntegrationHub\SendData\Interfaces
 */
interface SendDataService
{
    /**
     * Send data
     *
     * @return mixed
     */
    public function sendData(string $method, string $url, array $data = [], bool $isJson = false, array $headers = []);
}