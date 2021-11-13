<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
//    #[Route('/registration', name: 'registration')]
    public function index(UserPasswordHasherInterface  $passwordHasher, EntityManagerInterface $em): Response
    {
        $user = new User();
        $user->setUsername('Blast');
        $plaintextPassword = 'test123!';

        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);
        $em->persist($user);
        $em->flush($user);

        return $this->render('registration/index.html.twig', [
            'controller_name' => 'RegistrationController',
        ]);
    }
}

//csrf protection
//login//register forms
//vue login form
//request handler for view with JWT token(big one)
//login user
//finish