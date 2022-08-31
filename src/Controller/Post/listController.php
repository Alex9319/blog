<?php

namespace App\Controller\Post;

use App\Service\Post\listService as PostListService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class listController extends AbstractController
{
    #[Route('/list', name: 'app_post_list')]
    public function index(): JsonResponse
    {
        $listPost = new PostListService();

        $response = $listPost->listPost();

        return $this->json($response);
    }
}
