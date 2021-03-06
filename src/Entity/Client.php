<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 * @ORM\HasLifecycleCallbacks()
 * @ApiResource(
 * collectionOperations={
 *      "GET",
 *      "POST",
 *      "get_client"={
 *          "method"="get",
 *          "path"="/clients/{dateStart}/{dateEnd}",
 *          "controller"="App\Controller\ClientDateInterval",
 *          "swagger_context"={
 *              "summary"="Total user",
 *              "description"="Renvoie le nombre total de users actifs et inactifs"
 *          }
 *      }
 * }
 * 
 * )
 */
class Client
{
    use Timestamps;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({
     *     "client_read","ventes_read"
     * })
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     * @Assert\NotBlank()
     * @Groups({
     *     "client_read","ventes_read"
     * })
     */
    private $nomComplet;

    /**
     * @ORM\OneToMany(targetEntity=Vente::class, mappedBy="client")
     */
    private $ventes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({
     *     "client_read","ventes_read"
     * })
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({
     *     "client_read","ventes_read"
     * })
     */
    private $adresse;

    public function __construct()
    {
        $this->ventes = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomComplet(): ?string
    {
        return $this->nomComplet;
    }

    public function setNomComplet(?string $nomComplet): self
    {
        $this->nomComplet = $nomComplet;

        return $this;
    }

    /**
     * @return Collection|Vente[]
     */
    public function getVentes(): Collection
    {
        return $this->ventes;
    }

    public function addVente(Vente $vente): self
    {
        if (!$this->ventes->contains($vente)) {
            $this->ventes[] = $vente;
            $vente->setClient($this);
        }

        return $this;
    }

    public function removeVente(Vente $vente): self
    {
        if ($this->ventes->contains($vente)) {
            $this->ventes->removeElement($vente);
            // set the owning side to null (unless already changed)
            if ($vente->getClient() === $this) {
                $vente->setClient(null);
            }
        }

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }
}
