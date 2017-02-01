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

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titre_fr;

    /**
     * @var string
     */
    private $info_fr;

    /**
     * @var string
     */
    private $titre_en;

    /**
     * @var string
     */
    private $info_en;

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
     * Set titreFr
     *
     * @param string $titreFr
     *
     * @return Produit
     */
    public function setTitreFr($titreFr)
    {
        $this->titre_fr = $titreFr;

        return $this;
    }

    /**
     * Get titreFr
     *
     * @return string
     */
    public function getTitreFr()
    {
        return $this->titre_fr;
    }

    /**
     * Set infoFr
     *
     * @param string $infoFr
     *
     * @return Produit
     */
    public function setInfoFr($infoFr)
    {
        $this->info_fr = $infoFr;

        return $this;
    }

    /**
     * Get infoFr
     *
     * @return string
     */
    public function getInfoFr()
    {
        return $this->info_fr;
    }

    /**
     * Set titreEn
     *
     * @param string $titreEn
     *
     * @return Produit
     */
    public function setTitreEn($titreEn)
    {
        $this->titre_en = $titreEn;

        return $this;
    }

    /**
     * Get titreEn
     *
     * @return string
     */
    public function getTitreEn()
    {
        return $this->titre_en;
    }

    /**
     * Set infoEn
     *
     * @param string $infoEn
     *
     * @return Produit
     */
    public function setInfoEn($infoEn)
    {
        $this->info_en = $infoEn;

        return $this;
    }

    /**
     * Get infoEn
     *
     * @return string
     */
    public function getInfoEn()
    {
        return $this->info_en;
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
