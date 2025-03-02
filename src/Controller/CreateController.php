<?php

namespace App\Controller;

use App\Form\AlgorithmType;
use App\Service\AlgorithmService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateController extends AbstractController
{
    public function __construct(
        private readonly AlgorithmService $algorithmService,
    ) { }

    #[Route('/create', name: 'app_create')]
    public function index(Request $request): Response
    {
        $form = $this
            ->createForm(AlgorithmType::class)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();
            $this->algorithmService->createAlgorithm(
                $data->getTheme(),
                $data->getLevel(),
                $data->getTitle(),
                $data->getDescription(),
                $data->getSolution()
            );

            return $this->redirectToRoute('app_create');
        }
        
        return $this->render('algorithm/create.html.twig', [
            "form" => $form,
        ]);
    }
}