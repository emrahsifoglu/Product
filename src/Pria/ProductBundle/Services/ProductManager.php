<?php
namespace Pria\ProductBundle\Services;

use Doctrine\ORM\EntityManager;
use Pria\ProductBundle\Entity\Product;

class ProductManager {

    /**
     * @var EntityManager $em
     */
    protected $em;

    /**
     *@var string $imagesDirectory
     */
    protected $params;

    /**
     * @param EntityManager $em
     * @param array $params
     */
    public function __construct(EntityManager $em, $params){
        $this->em = $em;
        $this->params = $params;
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

    /**
     * @param int $id
     * @return Product
     */
    public function fetchProductById($id){
        return $this->em->getRepository('PriaProductBundle:Product')->loadProductById($id);
    }

    /**
     * @return Array
     */
    public function fetchProducts(){
        return $this->em->getRepository('PriaProductBundle:Product')->loadProductByAll();
    }

    public function updateProductById($id, $name, $description, $imageThumb, $imageBig, $externalLink){
        $product = $this->fetchProductById($id);
        $currentImageThumb = $product->getImageThumb();
        $currentImageBig = $product->getImageBig();
        if ($currentImageThumb != $imageThumb) unlink($this->getParameter('directoryImageThumb').$currentImageThumb);
        if ($currentImageBig != $imageBig) unlink($this->getParameter('directoryImageBig').$currentImageBig);
        return $this->em->getRepository('PriaProductBundle:Product')->updateProductById($id, $name, $description, $imageThumb, $imageBig, $externalLink);
    }

    public function deleteProductById($id){
        $product = $this->fetchProductById($id);
        $imageThumb = $product->getImageThumb();
        $imageBig = $product->getImageBig();
        $this->em->remove($product);
        $this->em->flush();
        unlink($this->getParameter('directoryImageBig').$imageBig);
        unlink($this->getParameter('directoryImageThumb').$imageThumb);
        return true;
    }

    private function getParameter($parameterKey)
    {
        if (array_key_exists($parameterKey, $this->params)) {
            return $this->params[$parameterKey];
        }

        return null;
    }
} 