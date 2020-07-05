<?php

namespace App\Entity;

use App\Repository\CaisseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CaisseRepository::class)
 */
class Caisse
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $caisseFinJournee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $controle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $entree;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $totalEntrees;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCaisseFinJournee(): ?string
    {
        return $this->caisseFinJournee;
    }

    public function setCaisseFinJournee(?string $caisseFinJournee): self
    {
        $this->caisseFinJournee = $caisseFinJournee;

        return $this;
    }

    public function getControle(): ?string
    {
        return $this->controle;
    }

    public function setControle(string $controle): self
    {
        $this->controle = $controle;

        return $this;
    }

    public function getEntree(): ?string
    {
        return $this->entree;
    }

    public function setEntree(?string $entree): self
    {
        $this->entree = $entree;

        return $this;
    }

    public function getTotalEntrees(): ?string
    {
        return $this->totalEntrees;
    }

    public function setTotalEntrees(?string $totalEntrees): self
    {
        $this->totalEntrees = $totalEntrees;

        return $this;
    }
}
