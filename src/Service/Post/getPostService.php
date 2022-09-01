<?php

namespace App\Service\Post;

use App\Service\Author\getDetailAuthorService;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Validation;

class getPostService
{

    /**
     * Function to get all information of a post and author of them
     *
     * @param int $idPost
     * @return array
     */
    function getPost($idPost){

        $result = [
            'data' => [
                'post'   => null,
                'author' => null
            ],
            'error'      => 'This post doesn`t exist',
            'status'     => false,
            'statusCode' => 400
        ];

        // Validate postId
        $validator = Validation::createValidator();
        $violations = $validator->validate($idPost, [
            new NotBlank(),
            new Positive(null, 'The value of IdPost is not correct'),
        ]);

        if (0 !== count($violations)) {
            // there are errors, now you can show them
            foreach ($violations as $violation) {
                $result['error'] = $violation->getMessage();
                return $result;
            }
        }

        $details = new getDetailPostService();          
        $post = $details->getDetailsPost($idPost);

        if($post['status'] == true){
            $details = new getDetailAuthorService();
            $postArray = json_decode(json_encode($post['data']), true);
            $postResult = $post['data'];
            
            // Validate authorId
            $validator = Validation::createValidator();
            $violations = $validator->validate($postArray['userId'], [
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

            $author = $details->getDetails($postArray['userId']);
            if($author['status'] == true){
                $authorResult = $author['data'];
            }else{
                $authorResult = null;
            }
        }else{
            $postResult = null;
        }

        if($post['status'] == true && $author['status'] == true){ 
            $result = [
                'data' => [
                    'post'   => $postResult,
                    'author' => $authorResult
                ],
                'status'           => true,
                'statusCode'       => 200
            ];
        }

        return $result;
    }

}