<?php

namespace App\Controller\API;

use App\Service\Post\getPostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class getPostController extends AbstractController
{
    #[Route('/api/get/post/{idPost}', name: 'app_api_get_post')]
    public function index(string $idPost): JsonResponse
    {
        $postService = new getPostService();
        $response = $postService->getPost($idPost);

        return $this->json($response, $response['statusCode']);
    }
}
