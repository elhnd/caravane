<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VenteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=VenteRepository::class)
 * @ORM\HasLifecycleCallbacks()
 * @ApiResource(
 *  normalizationContext={
 *      "groups"={"ventes_read"}
 *  }
 * )
 */
class Vente
{
    use Timestamps;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"ventes_read","fournisseur_produits_vendus_read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="ventes")
     *  @Groups({"ventes_read","fournisseur_produits_vendus_read"})
     */
    private $produit;

    /**
     * @ORM\Column(type="integer")
     *  @Groups({"ventes_read","fournisseur_produits_vendus_read"})
     */
    private $quantiteVendue;

    /**
     * @ORM\Column(type="bigint")
     *  @Groups({"ventes_read","fournisseur_produits_vendus_read"})
     */
    private $prixVenteTotal;

    /**
     * @ORM\Column(type="bigint")
     *  @Groups({"ventes_read","fournisseur_produits_vendus_read"})
     */
    private $prixNetPayer;

    /**
     * @ORM\Column(type="date")
     * @Groups({"ventes_read","fournisseur_produits_vendus_read"})
     */
    private $dateVente;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="ventes")
     * @Groups({"ventes_read"})
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDateVente(): ?\DateTimeInterface
    {
        return $this->dateVente;
    }

    public function setDateVente(\DateTimeInterface $dateVente): self
    {
        $this->dateVente = $dateVente;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
