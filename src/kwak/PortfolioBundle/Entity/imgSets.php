<?php

namespace kwak\PortfolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * imgSets
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class imgSets
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

     /**
     * @var string
     *
     * @ORM\Column(name="imgSrc", type="string", length=255)
     */
    private $imgSrc;




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
     * Set name
     *
     * @param string $name
     * @return imgSets
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return imgSets
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set imgSrc
     *
     * @param string $imgSrc
     * @return imgSets
     */
    public function setImgSrc($imgSrc)
    {
        $this->imgSrc = $imgSrc;
    
        return $this;
    }

    /**
     * Get imgSrc
     *
     * @return string 
     */
    public function getImgSrc()
    {
        return $this->imgSrc;
    }

    public function __toString()
    {
        return strval($this->title);
    }

}