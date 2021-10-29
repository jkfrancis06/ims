<?php


namespace App\Controller;


use ApiPlatform\Core\Validator\Exception\ValidationException;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ChangeUtilisateurPasswordController
{
    private $validator;
    private $userPasswordEncoder;
    private $entityManager;

    public function __construct(ValidatorInterface $validator, UserPasswordEncoderInterface $userPasswordEncoder, EntityManagerInterface $entityManager) {
        $this->userPasswordEncoder = $userPasswordEncoder;
        $this->validator = $validator;
        $this->entityManager = $entityManager;

    }



    public function __invoke(Request $request,Utilisateur $utilisateur)
    {


        $json_data = $request->getContent();

        $data = json_decode($json_data,true);



        // Validate data and handle validation errors
        $val = $this->validator->validate($utilisateur, null, ['validation-password']);

        if (count($val) > 0) {

            throw new \ApiPlatform\Core\Bridge\Symfony\Validator\Exception\ValidationException($val);
        }

        $encoded_password = $this->userPasswordEncoder->encodePassword($utilisateur, $utilisateur->getNewPassword());


        $utilisateur->setPassword($encoded_password);

        $this->entityManager->flush();

        $utilisateur->eraseCredentials();

        return $data;
    }


}