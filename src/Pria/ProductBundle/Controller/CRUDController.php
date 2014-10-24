<?php
namespace Pria\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CRUDController extends Controller {

    /**
     *@return object
     */
    public function getProductManager(){
        return $this->get('pria.product_manager');
    }

    public function createAction(Request $request)
    {
        $params = json_decode($request->getContent(), true);
        $name = $params['name'];
        $description = $params['description'];
        $imageThumb = $params['imageThumb'];
        $imageBig = $params['imageBig'];
        $externalLink = $params['externalLink'];
        $return = $this->getProductManager()->createProduct($name, $description, $imageThumb, $imageBig, $externalLink);
        return new JsonResponse(array('id' => $return));
    }

    public function fetchAction($id)
    {
        $product = $this->getProductManager()->fetchProductById($id);
        return new JsonResponse(array('product' => $product));
    }

    public function fetchAllAction()
    {
        $products = $this->getProductManager()->fetchProducts();
        return new JsonResponse(array('products' => $products));
    }

    public function updateAction(Request $request)
    {
        $params = json_decode($request->getContent(), true);
        $id = $params['id'];
        $name = $params['name'];
        $description = $params['description'];
        $imageThumb = $params['imageThumb'];
        $imageBig = $params['imageBig'];
        $externalLink = $params['externalLink'];
        $return = $this->getProductManager()->updateProductById($id, $name, $description, $imageThumb, $imageBig, $externalLink);
        return new JsonResponse(array('return' => $return));
    }

    public function deleteAction($id)
    {
        $return = $this->getProductManager()->deleteProductById($id);
        return new JsonResponse(array('return'=>$return));
    }
} 