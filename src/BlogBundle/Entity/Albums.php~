<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Albums
 *
 * @ORM\Table(name="albums")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\AlbumsRepository")
 * @Vich\Uploadable
 */
class Albums
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
     * @ORM\Column(name="chanteur", type="string", length=255)
     */
    private $chanteur;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\ManyToOne(targetEntity="Artiste", inversedBy="produit")
     * @ORM\JoinColumn(name="artiste_id", referencedColumnName="id")
     */
    private $artiste;

    /**
     * @ORM\ManyToOne(targetEntity="Genres", inversedBy="album")
     * @ORM\JoinColumn(name="genre_id", referencedColumnName="id")
     */
    private $genres;


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
     * Set chanteur
     *
     * @param string $chanteur
     *
     * @return Albums
     */
    public function setChanteur($chanteur)
    {
        $this->chanteur = $chanteur;

        return $this;
    }

    /**
     * Get chanteur
     *
     * @return string
     */
    public function getChanteur()
    {
        return $this->chanteur;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Albums
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return Albums
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     *
     * @return Albums
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set image.
     *
     * @param string $image
     *
     * @return Albums
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set artiste.
     *
     * @param \BlogBundle\Entity\Artiste|null $artiste
     *
     * @return Albums
     */
    public function setArtiste(\BlogBundle\Entity\Artiste $artiste = null)
    {
        $this->artiste = $artiste;

        return $this;
    }

    /**
     * Get artiste.
     *
     * @return \BlogBundle\Entity\Artiste|null
     */
    public function getArtiste()
    {
        return $this->artiste;
    }

    /**
     * Set genres.
     *
     * @param \BlogBundle\Entity\Genres|null $genres
     *
     * @return Albums
     */
    public function setGenres(\BlogBundle\Entity\Genres $genres = null)
    {
        $this->genres = $genres;

        return $this;
    }

    /**
     * Get genres.
     *
     * @return \BlogBundle\Entity\Genres|null
     */
    public function getGenres()
    {
        return $this->genres;
    }
}
