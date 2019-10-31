<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Artiste
 *
 * @ORM\Table(name="artiste")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\ArtisteRepository")
 * @Vich\Uploadable
 */
class Artiste
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="apropos", type="text")
     */
    private $apropos;

    /**
     * @ORM\OneToMany(targetEntity="Albums", mappedBy="artiste")
     */
    private $produit;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Artiste
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Artiste
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set apropos
     *
     * @param string $apropos
     *
     * @return Artiste
     */
    public function setApropos($apropos)
    {
        $this->apropos = $apropos;

        return $this;
    }

    /**
     * Get apropos
     *
     * @return string
     */
    public function getApropos()
    {
        return $this->apropos;
    }

    /**
     * Add produit.
     *
     * @param \BlogBundle\Entity\Albums $produit
     *
     * @return Artiste
     */
    public function addProduit(\BlogBundle\Entity\Albums $produit)
    {
        $this->produit[] = $produit;

        return $this;
    }

    /**
     * Remove produit.
     *
     * @param \BlogBundle\Entity\Albums $produit
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeProduit(\BlogBundle\Entity\Albums $produit)
    {
        return $this->produit->removeElement($produit);
    }

    /**
     * Get produit.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduit()
    {
        return $this->produit;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produit = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __tostring(){
        return $this->nom;
    }
}
