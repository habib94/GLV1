<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Projet\UserBundle\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

/**
 * Description of g
 *
 * @author el-habib
 */
class AuthenticationHandler implements AuthenticationSuccessHandlerInterface, AuthenticationFailureHandlerInterface
{
	private $router;
	private $session;
 
	/**
	 * Constructor
	 *
	 * @author 	Joe Sexton <joe@webtipblog.com>
	 * @param 	RouterInterface $router
	 * @param 	Session $session
	 */
	public function __construct( RouterInterface $router, Session $session )
	{
                $this->router  = $router;
		$this->session = $session;
	}
 
	/**
	 * onAuthenticationSuccess
 	 *
	 * @author 	Joe Sexton <joe@webtipblog.com>
	 * @param 	Request $request
	 * @param 	TokenInterface $token
	 * @return 	Response
	 */
	public function onAuthenticationSuccess( Request $request, TokenInterface $token )
	{
		// if AJAX login
		if ( $request->isXmlHttpRequest() ) {
			$response = new Response( json_encode(true ) );
			$response->headers->set( 'Content-Type', 'application/json' );
 
			return $response;
 
		// if form login 
		} else {
			if ( $this->session->get('_security.main.target_path' ) ) {
 
				$url = $this->session->get( '_security.main.target_path' );
 
			} else {
 
				$url = $this->router->generate( 'index' );
 
			} // end if
 
			return new RedirectResponse( $url );
 
		}
	}
 
	/**
	 * onAuthenticationFailure
	 *
	 * @author 	Joe Sexton <joe@webtipblog.com>
	 * @param 	Request $request
	 * @param 	AuthenticationException $exception
	 * @return 	Response
	 */
	 public function onAuthenticationFailure( Request $request, AuthenticationException $exception )
	{
		// if AJAX login
		if ( $request->isXmlHttpRequest() ) {
 
			$response = new Response( json_encode( false ) );
			$response->headers->set( 'Content-Type', 'application/json' );
 
			return $response;
 
		// if form login 
		} else {
                            
			// set authentication exception to session 
			return new RedirectResponse( $this->router->generate( 'login' ) );
		}
	}
}
