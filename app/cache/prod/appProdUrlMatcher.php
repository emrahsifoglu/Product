<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        // product_index
        if ($pathinfo === '/product') {
            return array (  '_controller' => 'Pria\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => 'product_index',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // login_form
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'Pria\\DemoBundle\\Controller\\LoginController::loginAction',  '_route' => 'login_form',);
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array (  '_controller' => 'Pria\\DemoBundle\\Controller\\LoginController::loginAction',  '_route' => 'login_check',);
                }

            }

            // logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'Pria\\DemoBundle\\Controller\\LogoutController::logoutAction',  '_route' => 'logout',);
            }

        }

        if (0 === strpos($pathinfo, '/product')) {
            // product_list
            if ($pathinfo === '/product/list') {
                return array (  '_controller' => 'Pria\\DemoBundle\\Controller\\ProductController::listAction',  '_route' => 'product_list',);
            }

            // product_show
            if (preg_match('#^/product/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_show')), array (  '_controller' => 'Pria\\DemoBundle\\Controller\\ProductController::showAction',));
            }

            // product_new
            if ($pathinfo === '/product/new') {
                return array (  '_controller' => 'Pria\\DemoBundle\\Controller\\DemoController::newAction',  '_route' => 'product_new',);
            }

            // product_edit
            if (preg_match('#^/product/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_edit')), array (  '_controller' => 'Pria\\DemoBundle\\Controller\\ProductController::editAction',));
            }

            if (0 === strpos($pathinfo, '/product_')) {
                // product_create
                if ($pathinfo === '/product_create') {
                    return array (  '_controller' => 'Pria\\DemoBundle\\Controller\\CRUDController::createAction',  '_route' => 'product_create',);
                }

                // product_read
                if ($pathinfo === '/product_read') {
                    return array (  '_controller' => 'Pria\\DemoBundle\\Controller\\CRUDController::readAction',  '_route' => 'product_read',);
                }

            }

            // product_update
            if ($pathinfo === '/product/update') {
                return array (  '_controller' => 'Pria\\DemoBundle\\Controller\\CRUDController::updateAction',  '_route' => 'product_update',);
            }

            // product_delete
            if ($pathinfo === '/product_delete') {
                return array (  '_controller' => 'Pria\\DemoBundle\\Controller\\CRUDController::deleteAction',  '_route' => 'product_delete',);
            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/lo')) {
                // admin_load_user
                if ($pathinfo === '/admin/load/user') {
                    return array (  '_controller' => 'Pria\\ProfileBundle\\Controller\\SecurityController::loadUserAction',  '_route' => 'admin_load_user',);
                }

                if (0 === strpos($pathinfo, '/admin/login')) {
                    // admin_login
                    if ($pathinfo === '/admin/login') {
                        return array (  '_controller' => 'Pria\\ProfileBundle\\Controller\\SecurityController::loginAction',  '_route' => 'admin_login',);
                    }

                    // admin_login_check
                    if ($pathinfo === '/admin/login_check') {
                        return array('_route' => 'admin_login_check');
                    }

                }

            }

            // admin_secure_area
            if ($pathinfo === '/admin/secure_area') {
                return array (  '_controller' => 'Pria\\ProfileBundle\\Controller\\SecurityController::dumpStringAction',  '_route' => 'admin_secure_area',);
            }

            // admin_logout
            if ($pathinfo === '/admin/logout') {
                return array('_route' => 'admin_logout');
            }

        }

        // file_file_homepage
        if ($pathinfo === '/file/upload') {
            return array (  '_controller' => 'File\\FileBundle\\Controller\\UploadController::uploadAction',  '_route' => 'file_file_homepage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
