<?php

namespace App\Controller;

use App\Form\AlgorithmType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(AlgorithmType::class)
                     ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

        }
        return $this->render('home/index.html.twig', [
            "form" => $form
        ]);
    }
}
