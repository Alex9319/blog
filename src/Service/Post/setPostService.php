<?php

namespace App\Service\Post;

use App\Service\Data\dataService;
use App\Service\Validate\validateService;

class setPostService
{

    /**
    * Function to set all information of a post and one author
    *
    * @param string $params
    * @return array
    */
    function setPost($params){

        $result = [
            'data'       => null,
            'error'      => 'This post can`t create',
            'status'     => false,
            'statusCode' => 400
        ];

        $validatorService = new validateService();
        $validate = $validatorService->validateSetPost($params);
        
        if($validate['status'] == true){
            $dataService = new dataService();
            $result = $dataService->setPostData($params);
        }else{
            $result['error'] = $validate['error'];
        }

        return $result;
    }

}