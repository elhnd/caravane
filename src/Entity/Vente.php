<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VenteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=VenteRepository::class)
 * @ORM\HasLifecycleCallbacks()
 * @ApiResource(
 *  normalizationContext={
 *      "groups"={"ventes_read"}
 *  },
 * denormalizationContext={
 *      "groups"={"ventes_write"}
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
     * @ORM\Column(type="bigint")
     *  @Groups({"ventes_read","fournisseur_produits_vendus_read","ventes_write"})
     */
    private $totalVente;

    /**
     * @ORM\Column(type="string")
     * @Groups({"ventes_read","fournisseur_produits_vendus_read","ventes_write"})
     */
    private $dateVente;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="ventes")
     * @Groups({"ventes_read","ventes_write"})
     */
    private $client;

    /**
     * @ORM\OneToMany(targetEntity=VenteProduit::class, mappedBy="vente")
     * @Groups({"ventes_read","ventes_write"})
     */
    private $venteProduits;

    public function __construct()
    {
        $this->venteProduits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotalVente(): ?string
    {
        return $this->totalVente;
    }

    public function setTotalVente(string $totalVente): self
    {
        $this->totalVente = $totalVente;

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

    public function getDateVente(): ?string
    {
        return $this->dateVente;
    }

    public function setDateVente(string $dateVente): self
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

    /**
     * @return Collection|VenteProduit[]
     */
    public function getVenteProduits(): Collection
    {
        return $this->venteProduits;
    }

    public function addVenteProduit(VenteProduit $venteProduit): self
    {
        if (!$this->venteProduits->contains($venteProduit)) {
            $this->venteProduits[] = $venteProduit;
            $venteProduit->setVente($this);
        }

        return $this;
    }

    public function removeVenteProduit(VenteProduit $venteProduit): self
    {
        if ($this->venteProduits->contains($venteProduit)) {
            $this->venteProduits->removeElement($venteProduit);
            // set the owning side to null (unless already changed)
            if ($venteProduit->getVente() === $this) {
                $venteProduit->setVente(null);
            }
        }

        return $this;
    }
}
