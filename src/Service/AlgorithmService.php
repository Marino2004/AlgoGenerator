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
    ){ }

    public function createAlgorithm (string $theme, Level $level): Algorithm
    {
        $algorithm = (new Algorithm)
            ->setTheme($theme)
            ->setLevel($level);
        
        $this->entityManager->persist($algorithm);
        $this->entityManager->flush();

        return $algorithm;
    }

    public function findAllAlgorithms(): array
    {
        return $this->algorithmRepository->findBy([],['id' => 'DESC']);
    }


}