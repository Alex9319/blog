<?php

namespace App\Service\Author;

use App\Service\Data\dataService;

class getDetailAuthorService
{

    /**
     * Function to get author`s details
     *
     * @param int $idAuthor
     * @return array
     */
    function getDetails($idAuthor){

        $result = [
            'data'       => null,
            'status'     => false,
            'statusCode' => 400
        ];

        $dataService = new dataService();
        $response = $dataService->getData('users/'.$idAuthor);

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