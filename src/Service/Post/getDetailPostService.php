<?php

namespace App\Service\Post;

use App\Service\Author\getDetailAuthorService;
use Symfony\Component\HttpClient\CurlHttpClient;

class getDetailPostService
{

    /**
     * Function to get all information of a post
     *
     * @param int $idPost
     * @return array
     */
    function getDetailsPost($idPost){

        $result = [
            'data'       => null,
            'status'     => false,
            'statusCode' => 400
        ];

        $client = new CurlHttpClient();

        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts/'.$idPost);

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