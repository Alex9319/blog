<?php

namespace App\Service\Data;

use Symfony\Component\HttpClient\CurlHttpClient;

class dataService implements dataServiceInterface {

    public function getData($url){

        $client = new CurlHttpClient();

        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/'.$url);

        return $response;

    }
    
    public function setPostData($params){

        $decoded = json_decode($params);
        $title = $decoded->title;
        $body = $decoded->body;
        $idAuthor = $decoded->idAuthor;
        
        $result = [
            'data'       => 'Guardado correctamente el post',
            'status'     => true,
            'statusCode' => 200
        ];

        return $result;
    }
} 