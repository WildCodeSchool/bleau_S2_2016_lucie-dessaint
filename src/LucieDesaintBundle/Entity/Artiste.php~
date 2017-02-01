<?php

namespace LucieDesaintBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraint as Assert;

/**
 * Artiste
 */
class Artiste
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $textepresentation_fr;

    /**
     * @var string
     */
    private $textepresentation_en;

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
     * Set textepresentationFr
     *
     * @param string $textepresentationFr
     *
     * @return Artiste
     */
    public function setTextepresentationFr($textepresentationFr)
    {
        $this->textepresentation_fr = $textepresentationFr;

        return $this;
    }

    /**
     * Get textepresentationFr
     *
     * @return string
     */
    public function getTextepresentationFr()
    {
        return $this->textepresentation_fr;
    }

    /**
     * Set textepresentationEn
     *
     * @param string $textepresentationEn
     *
     * @return Artiste
     */
    public function setTextepresentationEn($textepresentationEn)
    {
        $this->textepresentation_en = $textepresentationEn;

        return $this;
    }

    /**
     * Get textepresentationEn
     *
     * @return string
     */
    public function getTextepresentationEn()
    {
        return $this->textepresentation_en;
    }

    /**
     * Set image
     *
     * @param \LucieDesaintBundle\Entity\Images $image
     *
     * @return Artiste
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
