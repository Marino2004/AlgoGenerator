<?php

namespace App\Service;

use App\Config\Level;
use App\Entity\Algorithm;
use App\Repository\AlgorithmRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\EnumType;

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
            ->setThe
    }

}