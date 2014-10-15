<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        'product_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Pria\\DemoBundle\\Controller\\DemoController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/product',    ),  ),  4 =>   array (  ),),
        'login_form' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Pria\\DemoBundle\\Controller\\LoginController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login',    ),  ),  4 =>   array (  ),),
        'login_check' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Pria\\DemoBundle\\Controller\\LoginController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login_check',    ),  ),  4 =>   array (  ),),
        'logout' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Pria\\DemoBundle\\Controller\\LogoutController::logoutAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/logout',    ),  ),  4 =>   array (  ),),
        'product_list' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Pria\\DemoBundle\\Controller\\ProductController::listAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/product/list',    ),  ),  4 =>   array (  ),),
        'product_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Pria\\DemoBundle\\Controller\\ProductController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/product',    ),  ),  4 =>   array (  ),),
        'product_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Pria\\DemoBundle\\Controller\\DemoController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/product/new',    ),  ),  4 =>   array (  ),),
        'product_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Pria\\DemoBundle\\Controller\\ProductController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/product',    ),  ),  4 =>   array (  ),),
        'product_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Pria\\DemoBundle\\Controller\\CRUDController::createAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/product_create',    ),  ),  4 =>   array (  ),),
        'product_read' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Pria\\DemoBundle\\Controller\\CRUDController::readAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/product_read',    ),  ),  4 =>   array (  ),),
        'product_update' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Pria\\DemoBundle\\Controller\\CRUDController::updateAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/product/update',    ),  ),  4 =>   array (  ),),
        'product_delete' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Pria\\DemoBundle\\Controller\\CRUDController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/product_delete',    ),  ),  4 =>   array (  ),),
        'admin_load_user' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Pria\\ProfileBundle\\Controller\\SecurityController::loadUserAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/load/user',    ),  ),  4 =>   array (  ),),
        'admin_login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Pria\\ProfileBundle\\Controller\\SecurityController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/login',    ),  ),  4 =>   array (  ),),
        'admin_login_check' => array (  0 =>   array (  ),  1 =>   array (  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/login_check',    ),  ),  4 =>   array (  ),),
        'admin_secure_area' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Pria\\ProfileBundle\\Controller\\SecurityController::dumpStringAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/secure_area',    ),  ),  4 =>   array (  ),),
        'admin_logout' => array (  0 =>   array (  ),  1 =>   array (  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/logout',    ),  ),  4 =>   array (  ),),
        'file_file_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'File\\FileBundle\\Controller\\UploadController::uploadAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/file/upload',    ),  ),  4 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens);
    }
}
