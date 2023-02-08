<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TodoDoneController extends AbstractController
{
    /**
     * @Route("/dones", name="done_index")
     */
    public function index(): Response
    {
        return $this->render('todo_done/index.html.twig', [
            'controller_name' => 'TodoDoneController',
        ]);
    }
}
