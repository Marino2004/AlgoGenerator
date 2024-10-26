<?php

namespace App\Entity;

use App\Repository\AlgorithmRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlgorithmRepository::class)]
class Algorithm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $level = null;

    #[ORM\Column(length: 255)]
    private ?string $typeOfReturn = null;

    #[ORM\Column(length: 255)]
    private ?string $signature = null;

    #[ORM\Column(length: 255)]
    private ?string $exemple = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getTypeOfRetour(): ?string
    {
        return $this->typeOfReturn;
    }

    public function settypeOfReturn(string $typeOfReturn): static
    {
        $this->typeOfReturn = $typeOfReturn;

        return $this;
    }

    public function getSignature(): ?string
    {
        return $this->signature;
    }

    public function setSignature(string $signature): static
    {
        $this->signature = $signature;

        return $this;
    }

    public function getExemple(): ?string
    {
        return $this->exemple;
    }

    public function setExemple(string $exemple): static
    {
        $this->exemple = $exemple;

        return $this;
    }
}
