<?php

namespace App\Controller\Post;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class listController extends AbstractController
{
    #[Route('/list', name: 'app_post_list')]
    public function index(): JsonResponse
    {
        $result = [
            'message'    => '' ,
            'status'     => false,
            'statusCode' => 400
        ];

        return $this->json($result);
    }
}
