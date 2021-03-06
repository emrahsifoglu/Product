<?php

namespace Pria\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="Pria\ProductBundle\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image_big", type="string", length=100)
     */
    private $imageBig;

    /**
     * @var string
     *
     * @ORM\Column(name="image_thumb", type="string", length=100)
     */
    private $imageThumb;

    /**
     * @var string
     *
     * @ORM\Column(name="external_link", type="string", length=100)
     */
    private $externalLink;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Product
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
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set imageBig
     *
     * @param string $imageBig
     * @return Product
     */
    public function setImageBig($imageBig)
    {
        $this->imageBig = $imageBig;
    
        return $this;
    }

    /**
     * Get imageBig
     *
     * @return string 
     */
    public function getImageBig()
    {
        return $this->imageBig;
    }

    /**
     * Set imageThumb
     *
     * @param string $imageThumb
     * @return Product
     */
    public function setImageThumb($imageThumb)
    {
        $this->imageThumb = $imageThumb;
    
        return $this;
    }

    /**
     * Get imageThumb
     *
     * @return string 
     */
    public function getImageThumb()
    {
        return $this->imageThumb;
    }

    /**
     * Set externalLink
     *
     * @param string $externalLink
     * @return Product
     */
    public function setExternalLink($externalLink)
    {
        $this->externalLink = $externalLink;
    
        return $this;
    }

    /**
     * Get externalLink
     *
     * @return string 
     */
    public function getExternalLink()
    {
        return $this->externalLink;
    }
}