<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProduitRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 * @ORM\HasLifecycleCallbacks()
 * 
 */
class Produit
{
    use Timestamps;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"produit_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"produit_read"})
     * @Assert\NotBlank()
     * 
     * 
     */
    private $designation;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"produit_read"})
     * 
     */
    private $prixVente;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseur::class, inversedBy="produits")
     * @Groups({"produit_read"})
     * @Assert\NotBlank()
     * 
     * 
     */
    private $fournisseur;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="produit")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"produit_read"})
     * 
     * 
     */
    private $categorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getPrixVente(): ?string
    {
        return $this->prixVente;
    }

    public function setPrixVente(string $prixVente): self
    {
        $this->prixVente = $prixVente;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getQteVendue(): ?int
    {
        return $this->qteVendue;
    }

    public function setQteVendue(?int $qteVendue): self
    {
        $this->qteVendue = $qteVendue;

        return $this;
    }


    public function getStockInitial(): ?int
    {
        return $this->stockInitial;
    }

    public function setStockInitial(int $stockInitial): self
    {
        $this->stockInitial = $stockInitial;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
