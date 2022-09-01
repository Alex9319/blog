<?php

namespace App\Controller\API;

use App\Service\Post\setPostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\Routing\Annotation\Route;

class setPostController extends AbstractController
{
    #[Route('/api/set/post', name: 'app_api_set_post', methods: "POST")]
    public function setPost(HttpFoundationRequest $request): JsonResponse
    {

        $postService = new setPostService();
        $response = $postService->setPost($request->getContent());

        return $this->json($response, $response['statusCode']);
    }
}
