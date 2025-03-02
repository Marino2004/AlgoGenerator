<?php

namespace App\DataFixtures;

use App\Config\Level;
use App\Service\AlgorithmService;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{

    public function __construct(
        private  readonly AlgorithmService $algorithms,
    ) { }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        for ($i = 0; $i < 100; $i++)
        {
           $algorithm = $this->algorithms->createAlgorithm("L'agriculture", Level::EASY, 'Le fermier et ses pommes' );

           $manager->persist($algorithm);
        }

        $manager->flush();
    }
}