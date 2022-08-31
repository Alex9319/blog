<?php

namespace App\Service\Post;

use Symfony\Component\HttpClient\CurlHttpClient;

class listService
{

    /**
     * Function to get post`s list
     *
     * @return array
     */
    function listPost(){

        $result = [
            'data'       => null,
            'status'     => false,
            'statusCode' => 400
        ];

        $client = new CurlHttpClient();

        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts');

        $statusCode = $response->getStatusCode();
        if($statusCode == 200){
            $content = $response->getContent();
            $result = [
                'data'       => json_decode($content),
                'status'     => true,
                'statusCode' => $statusCode
            ];
        }

        return $result;
    }

}