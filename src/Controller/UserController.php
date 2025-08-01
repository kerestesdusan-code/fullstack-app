<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserController extends AbstractController
{
    #[Route('/users', name: 'app_users')]
    public function User(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();

        return $this->render('user/user.html.twig', [
            'users' => $users,
        ]);
    }
}
