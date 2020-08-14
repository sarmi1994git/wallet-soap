<?php

namespace App\Service;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityManager;

class UserService{


	private $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }
	
	public function createUser($identification, $firstname, $lastname, $email, $phone) {
		$response = new \stdClass;
		$response->code = 0;
		$response->message = '';
		try {
			$validate = $this->validateInputs($identification, $firstname, $lastname, $email, $phone);

			if ($validate->code === 0) {
				$repository = $this->em->getRepository(User::class);
				$userByEmail = $repository->findByEmail($email);
				$userByIdentification = $repository->findByIdentification($identification);
				if (!$userByEmail && !$userByIdentification) {
					//crear usuario
					$user = new User();
					$user->setIdentification($identification);
					$user->setFirstname($firstname);
					$user->setLastname($lastname);
					$user->setEmail($email);
					$user->setPhone($phone);
					$this->em->persist($user);
					$this->em->flush();
					$response->code = 0;
					$response->message = 'User created';
				} else {
					$response->code = 1;
					$response->message = 'El usuario ya ha sido registrado anteriormente';
				}
			} else {
				$response->code = 1;
				$response->message = $validate->message;
			}
			return $response;
		} catch(Exception $e) {
			$response->code = 1;
			$response->message = 'Exception: '.$e->getMessage();
			return $response;
		}
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

