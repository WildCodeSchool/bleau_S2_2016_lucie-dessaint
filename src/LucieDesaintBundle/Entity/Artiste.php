<?php

namespace LucieDesaintBundle\Entity;

/**
 * Artiste
 */
class Artiste
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $textepresentation;

    /**
     * @var string
     */
    private $textback;

    /**
     * @var string
     */
    private $textback2;


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
     * Set textepresentation
     *
     * @param string $textepresentation
     *
     * @return Artiste
     */
    public function setTextepresentation($textepresentation)
    {
        $this->textepresentation = $textepresentation;

        return $this;
    }

    /**
     * Get textepresentation
     *
     * @return string
     */
    public function getTextepresentation()
    {
        return $this->textepresentation;
    }

    /**
     * Set textback
     *
     * @param string $textback
     *
     * @return Artiste
     */
    public function setTextback($textback)
    {
        $this->textback = $textback;

        return $this;
    }

    /**
     * Get textback
     *
     * @return string
     */
    public function getTextback()
    {
        return $this->textback;
    }

    /**
     * Set textback2
     *
     * @param string $textback2
     *
     * @return Artiste
     */
    public function setTextback2($textback2)
    {
        $this->textback2 = $textback2;

        return $this;
    }

    /**
     * Get textback2
     *
     * @return string
     */
    public function getTextback2()
    {
        return $this->textback2;
    }
}

