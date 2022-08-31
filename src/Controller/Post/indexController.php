<?php

namespace App\Controller\Post;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class indexController extends AbstractController
{
    #[Route('/', name: 'app_post_index')]
    public function index(): Response
    {
        return $this->render('post/index/index.html.twig');
    }
}
