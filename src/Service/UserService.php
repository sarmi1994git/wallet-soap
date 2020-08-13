<?php

namespace App\Service;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityManager;

class UserService extends Controller{
	
	public function createUser($identification, $firstname, $lastname, $email, $phone) {
		$code;
		$message = '';
		$entityManager = $this->getDoctrine()->getManager();
		$validate = $this->validateInputs($identification, $firstname, $lastname, $email, $phone);

		if ($validate->code === 0) {
			//crear usuario
			$user = new User();
			$user->identification = $identification;
			$user->firstname = $firstname;
			$user->lastname = $lastname;
			$user->email = $email;
			$user->phone = $phone;
			$entityManager->persist($user);
			$entityManager->flush();
			$message = 'User created';
		} else {
			$message = $validate->message;
		}
		return $message;
	}

	public function validateInputs($identification, $firstname, $lastname, $email, $phone) {
		$response = new \stdClass;
		$response->code = 0;
		$response->message = 'Campos correctos';
		if (strlen($identification) === 0) {
			$response->code = 1;
			$response->message = 'El campo identificacion es requerido';
			return $response;
		}

		if (strlen($firstname) === 0) {
			$response->code = 1;
			$response->message = 'El campo firstname es requerido';
			return $response;
		}

		if (strlen($lastname) === 0) {
			$response->code = 1;
			$response->message = 'El campo lastname es requerido';
			return $response;
		}

		if (strlen($email) === 0) {
			$response->code = 1;
			$response->message = 'El campo email es requerido';
			return $response;
		}

		if (strlen($phone) === 0) {
			$response->code = 1;
			$response->message = 'El campo phone es requerido';
			return $response;
		}

		return $response;
	}
}

