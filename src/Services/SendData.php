<?php namespace professionalweb\IntegrationHub\SendData\Services;

use professionalweb\IntegrationHub\SendData\Interfaces\SendDataService;

/**
 * Service to send data to url
 * @package professionalweb\IntegrationHub\SendData\Services
 */
class SendData implements SendDataService
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
     * @throws \Exception
     */
    public function sendData(string $method, string $url, array $data = [], array $headers = [])
    {
        return $this->sendRequest($url, $method, $data, $headers);
    }

    /**
     * Send request
     *
     * @param string $url
     * @param string $method
     * @param array  $params
     * @param array  $headers
     *
     * @return string|array
     * @throws \Exception
     */
    protected function sendRequest(string $url, string $method = 'GET', array $params = [], array $headers = [])
    {
        $method = mb_strtolower($method);
        if ($method === 'get') {
            $url .= strpos($url, '?') ? '&' : '?';
            $url .= http_build_query($params);
        }

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'ProfessionalWeb.IntegratioHub/PHP');
        if ($method === 'post') {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
        } elseif ($method !== 'get') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, strtoupper($method));
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
        }
        $headersToSend = ['Content-Type:application/json'];
        foreach ($headers as $key => $val) {
            $headersToSend[] = $key . ':' . (\is_array($val) ? reset($val) : $val);
        }
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headersToSend);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $body = (string)curl_exec($curl);

        if (($code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) >= 400) {
            throw new \Exception($body, $code);
        }
        if (($contentType = curl_getinfo($curl, CURLINFO_CONTENT_TYPE)) !== null && strpos($contentType, 'json') !== false) {
            return json_decode($body, true);
        }

        return $body;
    }
}