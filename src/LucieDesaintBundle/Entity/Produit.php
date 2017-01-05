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

//  FONCTION DE METHOD UPLOAD
    public $file;

    /**
     * @ORM\PrePersist
     */
    public function preUpload()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->image = uniqid().'.'.$this->file->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->image);

        unset($this->file);
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

//  FONCTION DE TEST DU DOSSIER UPLOAD
    protected function getUploadDir()
    {
        return 'uploads/pictures';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->image ? null : $this->getUploadDir().'/'.$this->image;
    }

    public function getAbsolutePath()
    {
        return null === $this->image ? null : $this->getUploadRootDir().'/'.$this->image;
    }

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $textedescriptif;


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
     * Set textedescriptif
     *
     * @param string $textedescriptif
     *
     * @return Produit
     */
    public function setTextedescriptif($textedescriptif)
    {
        $this->textedescriptif = $textedescriptif;

        return $this;
    }

    /**
     * Get textedescriptif
     *
     * @return string
     */
    public function getTextedescriptif()
    {
        return $this->textedescriptif;
    }
    /**
     * @var \LucieDesaintBundle\Entity\Categories
     */
    private $categories;


    /**
     * Set categories
     *
     * @param \LucieDesaintBundle\Entity\Categories $categories
     *
     * @return Produit
     */
    public function setCategories(\LucieDesaintBundle\Entity\Categories $categories = null)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get categories
     *
     * @return \LucieDesaintBundle\Entity\Categories
     */
    public function getCategories()
    {
        return $this->categories;
    }
    /**
     * @var string
     */
    private $info;

    /**
     * @var string
     */
    private $Prix;


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
        $this->Prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->Prix;
    }
    /**
     * @var string
     */
    private $Image;


    /**
     * Set image
     *
     * @param string $image
     *
     * @return Produit
     */
    public function setImage($image)
    {
        $this->Image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->Image;
    }
    /**
     * @var string
     */
    private $Alt;


    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return Produit
     */
    public function setAlt($alt)
    {
        $this->Alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->Alt;
    }
}
