<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Fournisseur extends \App\Entity\Fournisseur implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'structure', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'nomGerant', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'tel', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'email', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'adresse', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'produits', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'commission', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'fraisExposition', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'createdAt', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'updatedAt'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'structure', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'nomGerant', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'tel', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'email', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'adresse', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'produits', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'commission', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'fraisExposition', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'createdAt', '' . "\0" . 'App\\Entity\\Fournisseur' . "\0" . 'updatedAt'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Fournisseur $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getStructure(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStructure', []);

        return parent::getStructure();
    }

    /**
     * {@inheritDoc}
     */
    public function setStructure(string $structure): \App\Entity\Fournisseur
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStructure', [$structure]);

        return parent::setStructure($structure);
    }

    /**
     * {@inheritDoc}
     */
    public function getNomGerant(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomGerant', []);

        return parent::getNomGerant();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomGerant(string $nomGerant): \App\Entity\Fournisseur
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomGerant', [$nomGerant]);

        return parent::setNomGerant($nomGerant);
    }

    /**
     * {@inheritDoc}
     */
    public function getTel(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTel', []);

        return parent::getTel();
    }

    /**
     * {@inheritDoc}
     */
    public function setTel(string $tel): \App\Entity\Fournisseur
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTel', [$tel]);

        return parent::setTel($tel);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', []);

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail(?string $email): \App\Entity\Fournisseur
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', [$email]);

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getAdresse(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdresse', []);

        return parent::getAdresse();
    }

    /**
     * {@inheritDoc}
     */
    public function setAdresse(string $adresse): \App\Entity\Fournisseur
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdresse', [$adresse]);

        return parent::setAdresse($adresse);
    }

    /**
     * {@inheritDoc}
     */
    public function getProduits(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProduits', []);

        return parent::getProduits();
    }

    /**
     * {@inheritDoc}
     */
    public function addProduit(\App\Entity\Produit $produit): \App\Entity\Fournisseur
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addProduit', [$produit]);

        return parent::addProduit($produit);
    }

    /**
     * {@inheritDoc}
     */
    public function removeProduit(\App\Entity\Produit $produit): \App\Entity\Fournisseur
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeProduit', [$produit]);

        return parent::removeProduit($produit);
    }

    /**
     * {@inheritDoc}
     */
    public function getCommission(): ?float
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCommission', []);

        return parent::getCommission();
    }

    /**
     * {@inheritDoc}
     */
    public function setCommission(?float $commission): \App\Entity\Fournisseur
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCommission', [$commission]);

        return parent::setCommission($commission);
    }

    /**
     * {@inheritDoc}
     */
    public function getFraisExposition(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFraisExposition', []);

        return parent::getFraisExposition();
    }

    /**
     * {@inheritDoc}
     */
    public function setFraisExposition(?string $fraisExposition): \App\Entity\Fournisseur
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFraisExposition', [$fraisExposition]);

        return parent::setFraisExposition($fraisExposition);
    }

    /**
     * {@inheritDoc}
     */
    public function getFournisseurProduitsVendus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFournisseurProduitsVendus', []);

        return parent::getFournisseurProduitsVendus();
    }

    /**
     * {@inheritDoc}
     */
    public function createdAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'createdAt', []);

        return parent::createdAt();
    }

    /**
     * {@inheritDoc}
     */
    public function updateAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'updateAt', []);

        return parent::updateAt();
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): \App\Entity\Fournisseur
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', [$createdAt]);

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', []);

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt(\DateTimeInterface $updatedAt): \App\Entity\Fournisseur
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', [$updatedAt]);

        return parent::setUpdatedAt($updatedAt);
    }

}