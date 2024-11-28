<?php

namespace BuyerListApiClient;

class BuyerListApiClient
{
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function sendRequest($params = [])
    {
        $baseUrl = $this->config->get('base_url');
        $defaultParams = $this->config->get('default_params', []);

        // Merge default and passed parameters
        $params = array_merge($defaultParams, $params);

        $queryString = http_build_query($params);
        $url = $baseUrl . '?' . $queryString;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new \Exception('Curl Error: ' . curl_error($curl));
        }

        curl_close($curl);
        return $response;
    }
}
