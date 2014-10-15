<?php

namespace Pria\DemoBundle\Component\Authentication;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;

class AuthenticationHandler implements AuthenticationSuccessHandlerInterface, AuthenticationFailureHandlerInterface
{
    /**
     * onAuthenticationSuccess
     *
     * @param Request $request
     * @param TokenInterface $token
     * @return Response
     */
    public function onAuthenticationSuccess( Request $request, TokenInterface $token )
    {
        if ( $request->isXmlHttpRequest() ) {

            $array = array( 'success' => true );
            $response = new Response( json_encode( $array ), 200);
            $response->headers->set( 'Content-Type', 'application/json' );

            return $response;
        }
    }

    /**
     * onAuthenticationFailure
     *
     * @param Request $request
     * @param AuthenticationException $exception
     * @return Response
     */
    public function onAuthenticationFailure( Request $request, AuthenticationException $exception )
    {
        if ( $request->isXmlHttpRequest() ) {

            $alert = array('success' => false, 'message' => $exception->getMessage(), 'level' => 'error');
            $response = new Response(json_encode($alert), 401);
            $response->headers->set('Content-Type', 'application/json');

            return $response;
        }
    }
}