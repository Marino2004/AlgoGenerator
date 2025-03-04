<?php

namespace App\Controller;

use App\Entity\Algorithm;
use App\Form\AlgorithmType;
use App\Service\AlgorithmService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AlgorithmController extends AbstractController
{
    public function __construct(
        private readonly AlgorithmService $algorithmService,
    ) { }

    #[Route('/create', name: 'app_create')]
    public function create(Request $request): Response
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

    #[Route('/get', name: 'app_get')]
    public function read(): Response
    {
        $result = $this->algorithmService->findAllAlgorithms();

        return $this->render('algorithm/get.html.twig', [
            'result' => $result,
        ]);
    }

    #[Route('/show/{id}', name: 'app_show')]
    public function show(Algorithm $algorithm): Response
    {
        return $this->render('algorithm/show.html.twig', [
            'algorithm' => $algorithm
        ]);
    }

    #[Route('{id}/export', name: 'app_pdf')]
    public function export(Algorithm $algorithm)
    {
        $pdfContent = $this->algorithmService->exportToPdf($algorithm);

        return new Response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="algo.pdf"',
        ]);
    }
}