<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Genres
 *
 * @ORM\Table(name="genres")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\GenresRepository")
 */
class Genres
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
     * @ORM\Column(name="genre", type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\OneToMany(targetEntity="Albums", mappedBy="genres")
     */
    private $album;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set genre.
     *
     * @param string $genre
     *
     * @return Genres
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre.
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->album = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add album.
     *
     * @param \BlogBundle\Entity\Albums $album
     *
     * @return Genres
     */
    public function addAlbum(\BlogBundle\Entity\Albums $album)
    {
        $this->album[] = $album;

        return $this;
    }

    /**
     * Remove album.
     *
     * @param \BlogBundle\Entity\Albums $album
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAlbum(\BlogBundle\Entity\Albums $album)
    {
        return $this->album->removeElement($album);
    }

    /**
     * Get album.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAlbum()
    {
        return $this->album;
    }
    public function __tostring(){
        return $this->genre;
    }
}
