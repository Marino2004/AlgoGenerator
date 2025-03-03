<?php

namespace App\Service;

use App\Config\Level;
use App\Entity\Algorithm;
use App\Repository\AlgorithmRepository;
use Doctrine\ORM\EntityManagerInterface;

class AlgorithmService
{
    public function __construct
    (
        private readonly EntityManagerInterface $entityManager,
        private readonly AlgorithmRepository $algorithmRepository,
        private readonly PdfService $pdfService,
    ){ }

    public function createAlgorithm(string $theme, Level $level, string $title, string $solution, string $description="description de l'algorithme"): Algorithm
    {
        $algorithm = (new Algorithm)
            ->setTheme($theme)
            ->setLevel($level)
            ->setTitle($title)
            ->setDescription($description)
            ->setSolution($solution);
        
        $this->entityManager->persist($algorithm);
        $this->entityManager->flush();

        return $algorithm;
    }

    public function findAllAlgorithms(): array
    {
        return $this->algorithmRepository->findBy([],['id' => 'DESC']);
    }

    public function exportToPdf(Algorithm $algorithm)
    {
        return  $this->pdfService->exportAlgorithmToPdf($algorithm);

    }
}