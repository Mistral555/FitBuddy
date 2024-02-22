<?php

namespace App\Entity;

use App\Repository\ProgrammeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProgrammeRepository::class)]
class Programme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $typeexo = null;

    #[ORM\Column(length: 255)]
    private ?string $regime = null;

    #[ORM\Column(length: 255)]
    private ?string $nbjours = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeexo(): ?string
    {
        return $this->typeexo;
    }

    public function setTypeexo(string $typeexo): static
    {
        $this->typeexo = $typeexo;

        return $this;
    }

    public function getRegime(): ?string
    {
        return $this->regime;
    }

    public function setRegime(string $regime): static
    {
        $this->regime = $regime;

        return $this;
    }

    public function getNbjours(): ?string
    {
        return $this->nbjours;
    }

    public function setNbjours(string $nbjours): static
    {
        $this->nbjours = $nbjours;

        return $this;
    }
}
