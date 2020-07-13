<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProduitRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ApiResource(
 *  normalizationContext={
 *      "groups"={"produit_read"}
 * },
 * )
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
     * @Groups({"produit_read","depots_read","ventes_read","produit_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"produit_read","depots_read","ventes_read","fournisseur_produits_vendus_read","produit_read"})
     * @Assert\NotBlank()
     * 
     * 
     */
    private $designation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"produit_read","ventes_read"})
     */
    private $taille;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"produit_read","ventes_read"})
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"produit_read","ventes_read"})
     */
    private $pointure;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"produit_read","ventes_read"})
     */
    private $couleur;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"produit_read","depots_read","ventes_read","fournisseur_produits_vendus_read"})
     * 
     */
    private $prixVente;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseur::class, inversedBy="produits")
     * @Groups({"produit_read","depots_read","ventes_read"})
     * @Assert\NotBlank()
     */
    private $fournisseur;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="produit")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"produit_read","depots_read","ventes_read"})
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity=Depot::class, mappedBy="produit")
     */
    private $depots;

    /**
     * @ORM\OneToMany(targetEntity=VenteProduit::class, mappedBy="produit")
     * 
     */
    private $venteProduits;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"produit_read","depots_read","ventes_read"})
     */
    private $quantite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"produit_read","depots_read","ventes_read"})
     */
    private $depot;

    public function __construct()
    {
        $this->depots = new ArrayCollection();
        $this->venteProduits = new ArrayCollection();
    }

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

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(?string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(?string $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getPointure(): ?string
    {
        return $this->pointure;
    }

    public function setPointure(?string $pointure): self
    {
        $this->pointure = $pointure;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

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

    /**
     * @return Collection|Depot[]
     */
    public function getDepots(): Collection
    {
        return $this->depots;
    }

    public function addDepot(Depot $depot): self
    {
        if (!$this->depots->contains($depot)) {
            $this->depots[] = $depot;
            $depot->setProduit($this);
        }

        return $this;
    }

    public function removeDepot(Depot $depot): self
    {
        if ($this->depots->contains($depot)) {
            $this->depots->removeElement($depot);
            // set the owning side to null (unless already changed)
            if ($depot->getProduit() === $this) {
                $depot->setProduit(null);
            }
        }

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
            $venteProduit->setProduit($this);
        }

        return $this;
    }

    public function removeVenteProduit(VenteProduit $venteProduit): self
    {
        if ($this->venteProduits->contains($venteProduit)) {
            $this->venteProduits->removeElement($venteProduit);
            // set the owning side to null (unless already changed)
            if ($venteProduit->getProduit() === $this) {
                $venteProduit->setProduit(null);
            }
        }

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getDepot(): ?string
    {
        return $this->depot;
    }

    public function setDepot(?string $depot): self
    {
        $this->depot = $depot;

        return $this;
    }
    
}
