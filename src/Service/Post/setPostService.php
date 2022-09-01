<?php

namespace App\Service\Post;

use App\Service\Author\getDetailAuthorService;
use App\Service\Data\dataService;
use phpDocumentor\Reflection\PseudoTypes\PositiveInteger;
use Symfony\Component\Validator\Constraints\EqualTo;
use Symfony\Component\Validator\Constraints\IsNull;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Validation;

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