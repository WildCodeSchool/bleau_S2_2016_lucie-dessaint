<?php

namespace LucieDesaintBundle\Entity;

/**
 * Categories
 */
class Categories
{
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->label;
    }
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $label;


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
     * Set label
     *
     * @param string $label
     *
     * @return Categories
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }
}
