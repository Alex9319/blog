<?php

namespace App\Controller\Post;

use App\Service\Post\getPostService as PostGetPostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class detailController extends AbstractController
{
    #[Route('/post/detail/{idPost}', name: 'app_post_detail')]
    public function index(string $idPost): Response
    {

        $details = new PostGetPostService();
        $detailsPost = $details->getPost($idPost);

        return $this->render('post/detail/index.html.twig', [
            'detailsPost' => $detailsPost,
        ]);
    }
}
