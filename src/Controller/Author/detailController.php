<?php

namespace App\Controller\Author;

use App\Service\getDetailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class detailController extends AbstractController
{
    #[Route('/author/detail/{idAuthor}', name: 'app_author_detail')]
    public function details(string $idAuthor): Response
    {

        $details = new getDetailService();
        $author = $details->getDetails($idAuthor);

        return $this->render('author/detail/index.html.twig', [
            'author' => $author,
        ]);
    }
}
