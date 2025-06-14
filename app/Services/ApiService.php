<?php

namespace App\Services;

use GuzzleHttp\Client;

class ApiService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            // Set any default options for the client if needed
        ]);
    }

    public function makeApiRequest($url, $method, $options = [])
    {
        $response = $this->client->request($method, $url, $options);

        // Process and return the API response as needed
        return $response->getBody()->getContents();
    }
}
