<?php

namespace App\Service\Post;

use App\Service\Data\dataService;

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


        $dataService = new dataService();
        $response = $dataService->getData('posts');

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