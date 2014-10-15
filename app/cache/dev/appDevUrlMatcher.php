<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/api/v1/product')) {
            // _api_create
            if ($pathinfo === '/api/v1/product/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not__api_create;
                }

                return array (  '_controller' => 'Pria\\ProductBundle\\Controller\\CRUDController::createAction',  '_format' => 'json',  '_route' => '_api_create',);
            }
            not__api_create:

            // _api_read
            if (preg_match('#^/api/v1/product/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not__api_read;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => '_api_read')), array (  '_controller' => 'Pria\\ProductBundle\\Controller\\CRUDController::readAction',  '_format' => 'json',));
            }
            not__api_read:

            // _api_readAll
            if (rtrim($pathinfo, '/') === '/api/v1/product') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not__api_readAll;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_api_readAll');
                }

                return array (  '_controller' => 'Pria\\ProductBundle\\Controller\\CRUDController::readAllAction',  '_format' => 'json',  '_route' => '_api_readAll',);
            }
            not__api_readAll:

            // _api_update
            if (preg_match('#^/api/v1/product/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not__api_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => '_api_update')), array (  '_controller' => 'Pria\\ProductBundle\\Controller\\CRUDController::updateAction',  '_format' => 'json',));
            }
            not__api_update:

            // _api_delete
            if (preg_match('#^/api/v1/product/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not__api_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => '_api_delete')), array (  '_controller' => 'Pria\\ProductBundle\\Controller\\CRUDController::deleteAction',  '_format' => 'json',));
            }
            not__api_delete:

        }

        // index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'index');
            }

            return array (  '_controller' => 'Pria\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => 'index',);
        }

        // home
        if ($pathinfo === '/home') {
            return array (  '_controller' => 'Pria\\DemoBundle\\Controller\\DemoController::homeAction',  '_route' => 'home',);
        }

        // login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'Pria\\DemoBundle\\Controller\\DemoController::loginAction',  '_route' => 'login',);
        }

        if (0 === strpos($pathinfo, '/oauth')) {
            // login_check
            if ($pathinfo === '/oauth/login_check') {
                return array('_route' => 'login_check');
            }

            // login_success
            if (rtrim($pathinfo, '/') === '/oauth') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'login_success');
                }

                return array (  '_controller' => 'Pria\\DemoBundle\\Controller\\DemoController::securedAction',  '_route' => 'login_success',);
            }

            // secured_area
            if (rtrim($pathinfo, '/') === '/oauth') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'secured_area');
                }

                return array (  '_controller' => 'Pria\\DemoBundle\\Controller\\DemoController::securedAction',  '_route' => 'secured_area',);
            }

            // user_area
            if (rtrim($pathinfo, '/') === '/oauth/user') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'user_area');
                }

                return array (  '_controller' => 'Pria\\DemoBundle\\Controller\\DemoController::userAction',  '_route' => 'user_area',);
            }

            // admin_area
            if (rtrim($pathinfo, '/') === '/oauth/admin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_area');
                }

                return array (  '_controller' => 'Pria\\DemoBundle\\Controller\\DemoController::adminAction',  '_route' => 'admin_area',);
            }

            // logout
            if ($pathinfo === '/oauth/logout') {
                return array('_route' => 'logout');
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
