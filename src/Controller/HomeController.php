<?php

namespace App\Controller;

use App\Form\AlgorithmType;
use App\Service\AlgorithmService;
use App\Service\OpenAiChatService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    public function __construct(
        private readonly OpenAiChatService $openAiChatService,
        private readonly AlgorithmService $algorithms,
    )
    {
        
    }
    #[Route('/', name: 'app_home')]
    public function index(Request $request): Response
    {
        $form = $this
            ->createForm(AlgorithmType::class)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->openAiChatService->createAlgorithm($form->getData());

            return $this->redirectToRoute('app_home');
        }

        
        return $this->render('home/index.html.twig', [
            "form" => $form->createView(),
            "algorithms" => $this->algorithms->findAllAlgorithms(),
        ]);
    }
}
