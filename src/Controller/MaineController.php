<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MaineController extends AbstractController
{
    #[Route('/maine', name: 'app_maine')]
    public function notifications(): Response
    {
        // получить информацию пользователя и уведомления каким-то образом
        $userFirstName = '...';
        $userNotifications = ['...', '...'];

        // путь шаблона - это относительн путь файла из `templates/`
        return $this->render('user/notifications.html.twig', [
            // этот массив определяет переменные, переданные шаблону, где ключ - это
            // имя переменной, а значение - значение переменной
            // (Twig рекомендует использование имен переменных snake_case : 'foo_bar' вместо 'fooBar')
            'user_first_name' => $userFirstName,
            'notifications' => $userNotifications,
        ]);
    }
}
