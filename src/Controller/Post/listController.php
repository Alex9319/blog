<?php

namespace App\Controller\Post;

use App\Service\listService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class listController extends AbstractController
{
    #[Route('/list', name: 'app_post_list')]
    public function index(): JsonResponse
    {
        $listPost = new listService();

        $response = $listPost->listPost();

        return $this->json($response);
    }
}
