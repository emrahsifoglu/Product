<?php
namespace Pria\ProductBundle\Services;

use Doctrine\ORM\EntityManager;
use Pria\ProductBundle\Entity\Product;

class ProductManager {

    /**
     * @var EntityManager $em
     */
    protected $em;

    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    /**
     * @param int $id
     * @return Product
     */
    public function loadProductById($id){
        return $this->em->getRepository('PriaProductBundle:Product')->loadProductById($id);
    }

    /**
     * @return Array
     */
    public function loadProductByAll(){
        return $this->em->getRepository('PriaProductBundle:Product')->loadProductByAll();
    }

    public function updateProductById($id, $name, $description, $imageThumb, $imageBig, $externalLink){
        return $this->em->getRepository('PriaProductBundle:Product')->updateProductById($id, $name, $description, $imageThumb, $imageBig, $externalLink);
    }

    public function createProduct($name, $description, $imageThumb, $imageBig, $externalLink){
        $product = new Product();
        $product->setName($name);
        $product->setDescription($description);
        $product->setExternalLink($externalLink);
        $product->setImageBig($imageBig);
        $product->setImageThumb($imageThumb);
        $this->em->persist($product);
        $this->em->flush();
        return $product->getId();
    }

    public function deleteProductById($id){
        $product = $this->loadProductById($id);
        $this->em->remove($product);
        $this->em->flush();
        return 1;
    }
} 