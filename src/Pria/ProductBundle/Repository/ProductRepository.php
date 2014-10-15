<?php
namespace Pria\ProductBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Pria\ProductBundle\Modals\ProductModel;

class ProductRepository extends EntityRepository  {

    public function loadProductById($id){
        $q = $this
            ->createQueryBuilder('p')
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->getQuery();

        try {
            $product = $q->getSingleResult();
        } catch (NoResultException $e) {
            $product = new ProductModel();
            $product->setId(0);
        }
        return $product;
    }

    public function loadProductByAll() {
        $q = $this
            ->createQueryBuilder('p')
            ->select('p.id, p.name, p.imageThumb, p.imageBig, p.description, p.externalLink')
            ->getQuery();

         return $q->getResult();
    }

    public function updateProductById($id, $name, $description, $imageThumb, $imageBig, $externalLink){
        $q = $this->createQueryBuilder('p')
            ->update()
            ->set('p.name', ':name')
            ->set('p.description', ':description')
            ->set('p.imageThumb', ':imageThumb')
            ->set('p.imageBig', ':imageBig')
            ->set('p.externalLink', ':externalLink')
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->setParameter('name', $name)
            ->setParameter('description', $description)
            ->setParameter('imageThumb', $imageThumb)
            ->setParameter('imageBig', $imageBig)
            ->setParameter('externalLink', $externalLink)
            ->getQuery();
        return $q->execute();
    }
} 