<?php

namespace App\Controller;

use App\Entity\Algorithm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ShowController extends AbstractController
{
    #[Route('/show/{id}', name: 'app_show')]
    public function show(Algorithm $algorithm): Response
    {
        return $this->render('algorithm/show.html.twig', [
            'algorithm' => $algorithm
        ]);
    }
}
