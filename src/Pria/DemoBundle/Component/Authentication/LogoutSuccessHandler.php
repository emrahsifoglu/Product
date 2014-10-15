<?php
namespace Pria\DemoBundle\Component\Authentication;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Symfony\Component\HttpFoundation\Request;

class LogoutSuccessHandler implements LogoutSuccessHandlerInterface
{
    /**
     * {@inheritDoc}
     */
    public function onLogoutSuccess(Request $request)
    {
        $alert = array('success' => true, 'message' => 'You successfully logged out.', 'redirectURL' => $request->getBaseUrl().'/');
        $response = new Response(json_encode($alert));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}