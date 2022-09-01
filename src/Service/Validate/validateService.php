<?php

namespace App\Service\Post;

use App\Service\Author\getDetailAuthorService;
use Symfony\Component\Validator\Constraints\EqualTo;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Validation;

class validateService
{

    /**
    * Function to validate all information of a post and one author set
    *
    * @param string $params
    * @return array
    */
    function validateSetPost($params){

        $result = [
            'data'       => null,
            'error'      => 'This post can`t create',
            'status'     => false,
            'statusCode' => 400
        ];

        $decoded = json_decode($params);

        // Validate title
        $validator = Validation::createValidator();
        $violations = $validator->validate($decoded->title, [
            new NotBlank(),
            new Length([
                'min' => 5, 
                'max' =>50,
                'minMessage' => 'The value of title it`s too short', 
                'maxMessage' => 'The value of title it`s too long'
            ]),
        ]);

        if (0 !== count($violations)) {
            // there are errors, now you can show them
            foreach ($violations as $violation) {
                $result['error'] = $violation->getMessage();
                return $result;
            }
        }
        // Validate body
        $validator = Validation::createValidator();
        $violations = $validator->validate($decoded->body, [
            new NotBlank(),
            new Length([
                'min' => 50, 
                'max' => 1000,
                'minMessage' => 'The value of body it`s too short', 
                'maxMessage' => 'The value of body it`s too long'
            ]),
        ]);

        if (0 !== count($violations)) {
            // there are errors, now you can show them
            foreach ($violations as $violation) {
                $result['error'] = $violation->getMessage();
                return $result;
            }
        }
        // Validate author
        $validator = Validation::createValidator();
        $violations = $validator->validate($decoded->idAuthor, [
            new NotBlank(),
            new Positive(null, 'The value of Author is not correct'),
        ]);

        if (0 !== count($violations)) {
            // there are errors, now you can show them
            foreach ($violations as $violation) {
                $result['error'] = $violation->getMessage();
                return $result;
            }
        }

        $details = new getDetailAuthorService();
        $author = $details->getDetails($decoded->idAuthor);
        if($author['status'] == true){
            $result = [
                'data'       => null,
                'error'      => null,
                'status'     => true,
                'statusCode' => 200
            ];
            return $result;
        }else{
            $result['error'] = 'The author can`t found';
            return $result;
        }


    }

}