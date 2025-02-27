<?php

namespace App\Controller;

use App\Service\AlgorithmService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GetController extends AbstractController
{

    public function __construct(
        private readonly AlgorithmService $algorithm,
    ) { }

    #[Route('/get', name: 'app_get')]
    public function index(): Response
    {
        $result = $this->algorithm->findAllAlgorithms();

        if (count($result) === 0)
            dd("void data on result");

        return $this->render('algorithm/get.html.twig', [
            'controller_name' => 'GetController',
            'result' => $result,
        ]);
    }
}