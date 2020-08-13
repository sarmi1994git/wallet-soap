<?php

namespace App\Controller;

use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserServiceController extends AbstractController {
	/**
     * @Route("/wallet")
     */
	public function index(UserService $userService) {
		$soapServer = new \SoapServer(dirname(__FILE__).'/wallet.wsdl');
		$soapServer->setObject($userService);

		$response = new Response();
		$response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

		ob_start();
		$soapServer->handle();
		$response->setContent(ob_get_clean());

		return $response;
	}
}