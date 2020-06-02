<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DepotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 * normalizationContext={
 *      "groups"={"depots_read"}
 * },
 * 
 * )
 * @ORM\Entity(repositoryClass=DepotRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Depot
{
    use Timestamps;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"depots_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"depots_read"})
     */
    private $stockInitial;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"depots_read"})
     */
    private $quantiteDeposee;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"depots_read"})
     */
    private $EnStock;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"depots_read"})
     */
    private $quantiteVendue;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"depots_read"})
     */
    private $quantiteRestantee;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="depots")
     * @Groups({"depots_read"})
     */
    private $produit;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getQuantiteDeposee(): ?int
    {
        return $this->quantiteDeposee;
    }

    public function setQuantiteDeposee(int $quantiteDeposee): self
    {
        $this->quantiteDeposee = $quantiteDeposee;

        return $this;
    }

    public function getEnStock(): ?int
    {
        return $this->EnStock;
    }

    public function setEnStock(int $EnStock): self
    {
        $this->EnStock = $EnStock;

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

    public function getQuantiteRestantee(): ?int
    {
        return $this->quantiteRestantee;
    }

    public function setQuantiteRestantee(int $quantiteRestantee): self
    {
        $this->quantiteRestantee = $quantiteRestantee;

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
}
