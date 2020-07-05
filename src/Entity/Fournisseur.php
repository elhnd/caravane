<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=FournisseurRepository::class)
 * @ApiResource(
 *  normalizationContext={
 *      "groups"={"fournisseur_produits_vendus_read"}
 *  },
 * itemOperations={
 *      "GET",
 *      "PUT",
 *      "DELETE",
 *      "get_fournisseur"={
 *          "method"="get",
 *          "path"="/access/fournisseurs/{id}",
 *          "controller"="App\Controller\AccessFournisseur"
 *      }
 * }
 * )
 * @ORM\HasLifecycleCallbacks()
 */
class Fournisseur
{
    use Timestamps;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"fournisseur_produits_vendus_read","ventes_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     * @Groups({"produit_read","depots_read","ventes_read","fournisseur_produits_vendus_read","produit_read"})
     * 
     */
    private $structure;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $nomGerant;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity=Produit::class, mappedBy="fournisseur")
     */
    private $produits;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"produit_read","depots_read","ventes_read","fournisseur_produits_vendus_read","produit_read"})
     */
    private $commission;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     * @Groups({"produit_read","depots_read","ventes_read","fournisseur_produits_vendus_read","produit_read"})
     */
    private $fraisExposition;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tokenAccess;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $tokenExpireAt;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStructure(): ?string
    {
        return $this->structure;
    }

    public function setStructure(string $structure): self
    {
        $this->structure = $structure;

        return $this;
    }

    public function getNomGerant(): ?string
    {
        return $this->nomGerant;
    }

    public function setNomGerant(string $nomGerant): self
    {
        $this->nomGerant = $nomGerant;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setFournisseur($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->contains($produit)) {
            $this->produits->removeElement($produit);
            // set the owning side to null (unless already changed)
            if ($produit->getFournisseur() === $this) {
                $produit->setFournisseur(null);
            }
        }

        return $this;
    }

    public function getCommission(): ?float
    {
        return $this->commission;
    }

    public function setCommission(?float $commission): self
    {
        $this->commission = $commission;

        return $this;
    }

    public function getFraisExposition(): ?string
    {
        return $this->fraisExposition;
    }

    public function setFraisExposition(?string $fraisExposition): self
    {
        $this->fraisExposition = $fraisExposition;

        return $this;
    }

    public function getFournisseurProduitsVendus()
    {

        $produits = $this->getProduits();
        $produitVendus = [];
        foreach ($produits as $produit) {
            $ventes = $produit->getVentes();

            for ($i = 0; $i < count($ventes); $i++) {

                array_push($produitVendus, $ventes[$i]);
            }
        }

        return $produitVendus;
    }

    public function getTokenAccess(): ?string
    {
        return $this->tokenAccess;
    }

    public function setTokenAccess(?string $tokenAccess): self
    {
        $this->tokenAccess = $tokenAccess;

        return $this;
    }

    public function getTokenExpireAt(): ?\DateTimeInterface
    {
        return $this->tokenExpireAt;
    }

    public function setTokenExpireAt(?\DateTimeInterface $tokenExpireAt): self
    {
        $this->tokenExpireAt = $tokenExpireAt;

        return $this;
    }
}
