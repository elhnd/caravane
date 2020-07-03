<?php

namespace App\Entity;

use App\Repository\VenteProduitRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VenteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=VenteProduitRepository::class)
 * @ORM\HasLifecycleCallbacks()
 * @ApiResource()
 */
class VenteProduit
{
    use Timestamps;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"ventes_read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Vente::class, inversedBy="venteProduits",cascade={"persist"})
     */
    private $vente;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="venteProduits",cascade={"persist"})
     * @Groups({"ventes_read"})
     */
    private $produit;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"ventes_read"})
     */
    private $quantiteVendue;

    /**
     * @ORM\Column(type="bigint")
     * @Groups({"ventes_read"})
     */
    private $prixVenteTotal;

    /**
     * @ORM\Column(type="bigint")
     * @Groups({"ventes_read"})
     */
    private $prixNetPayer;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"ventes_read"})
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"ventes_read"})
     */
    private $commentaire;

    /**
     * @ORM\Column(type="string",nullable=true)
     * @Groups({"ventes_read"})
     */
    private $dateVente;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVente(): ?Vente
    {
        return $this->vente;
    }

    public function setVente(?Vente $vente): self
    {
        $this->vente = $vente;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getQuantiteVendue(): ?int
    {
        return $this->quantiteVendue;
    }

    public function setQuantiteVendue(int $quantiteVendue): self
    {
        $this->quantiteVendue = $quantiteVendue;

        return $this;
    }

    public function getPrixVenteTotal(): ?string
    {
        return $this->prixVenteTotal;
    }

    public function setPrixVenteTotal(string $prixVenteTotal): self
    {
        $this->prixVenteTotal = $prixVenteTotal;

        return $this;
    }

    public function getPrixNetPayer(): ?string
    {
        return $this->prixNetPayer;
    }

    public function setPrixNetPayer(string $prixNetPayer): self
    {
        $this->prixNetPayer = $prixNetPayer;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getDateVente(): ?string
    {
        return $this->dateVente;
    }

    public function setDateVente(string $dateVente): self
    {
        $this->dateVente = $dateVente;

        return $this;
    }
}
