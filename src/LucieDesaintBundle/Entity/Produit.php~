<?php

namespace LucieDesaintBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Produit
 */
class Produit
{
//    public function __toString()
//    {
//        // TODO: Implement __toString() method.
//        return $this->categories;
//    }


    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $info;

    /**
     * @var string
     */
    private $prix;

    /**
     * @var \LucieDesaintBundle\Entity\Categories
     */
    private $categorie;

    /**
     * @var \LucieDesaintBundle\Entity\Images
     */
    private $image;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Produit
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
     * Set info
     *
     * @param string $info
     *
     * @return Produit
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set categorie
     *
     * @param \LucieDesaintBundle\Entity\Categories $categorie
     *
     * @return Produit
     */
    public function setCategorie(\LucieDesaintBundle\Entity\Categories $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \LucieDesaintBundle\Entity\Categories
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set image
     *
     * @param \LucieDesaintBundle\Entity\Images $image
     *
     * @return Produit
     */
    public function setImage(\LucieDesaintBundle\Entity\Images $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \LucieDesaintBundle\Entity\Images
     */
    public function getImage()
    {
        return $this->image;
    }
}
