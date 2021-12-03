<?php

namespace Controllers;
use Google\Client;
class APIController{

    public static function APIIndexing(){

        $client = new Client();
        $addr = __DIR__ . '/api-altex-e88fd63ddc80.json';

        // service_account_file.json is the private key that you created for your service account.
        $client->setAuthConfig($addr);
        $client->addScope('https://www.googleapis.com/auth/indexing');

        // Get a Guzzle HTTP Client
        $httpClient = $client->authorize();
        $endpoint = 'https://indexing.googleapis.com/v3/urlNotifications:publish';

        // Define contents here. The structure of the content is described in the next step.
        $content = '{
        "url": "https://altexdays.herokuapp.com/",
        "type": "URL_UPDATED"
        }';

        $response = $httpClient->post($endpoint, [ 'body' => $content ]);
        $status_code = $response->getStatusCode();

    }

    public static function getRequest(){

        echo json_decode('https://indexing.googleapis.com/v3/urlNotifications/metadata?url=https%3A%2F%2Faltexdays.herokuapp.com%2F');
    }
}