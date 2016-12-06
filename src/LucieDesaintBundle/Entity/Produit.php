<?php

namespace LucieDesaintBundle\Entity;

/**
 * Produit
 */
class Produit
{
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
}
