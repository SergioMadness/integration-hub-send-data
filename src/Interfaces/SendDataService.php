<?php namespace professionalweb\IntegrationHub\SendData\Interfaces;

/**
 * Interface for service to send data to url
 * @package professionalweb\IntegrationHub\SendData\Interfaces
 */
interface SendDataService
{
    /**
     * Send data
     *
     * @param string $method
     * @param string $url
     * @param array  $data
     * @param array  $headers
     *
     * @return mixed
     */
    public function sendData(string $method, string $url, array $data = [], array $headers = []);
}