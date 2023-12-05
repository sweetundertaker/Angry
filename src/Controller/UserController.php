<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        // Менеджер через который работаешь с сущностями
        $this->entityManager = $entityManager;
    }

    #[Route('/example', name: 'app_example')]
    public function index(Request $request): Response
    {
        $user = new User();
        $user->setLogin($request->query->get("name"));
        $user->setLastLogin(new \DateTimeImmutable());
        $user->setPassword($request->query->get("password"));
        $this->entityManager->persist($user); //Подготовка сущности к сохранению
        $this->entityManager->flush(); // Сохранение


        return $this->render('user/index.html.twig', [
            'controller_name' => 'ExampleController',
        ]);
    }
    #[Route('/user/get/{id}', name: 'user_get')]
    public function get(Request $request, int $id): Response
    {
        return $this->json([]);
    }
}
