<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrashController extends AbstractController
{
    /**
     * @Route("/trashs", name="trash_index")
     */
    public function index(): Response
    {
        return $this->render('trash/index.html.twig', [
            'controller_name' => 'TrashController',
        ]);
    }
}
