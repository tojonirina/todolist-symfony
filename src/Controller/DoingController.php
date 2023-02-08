<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DoingController extends AbstractController
{
    /**
     * @Route("/doings", name="doing_index")
     */
    public function index(): Response
    {
        return $this->render('doing/index.html.twig', [
            'controller_name' => 'DoingController',
        ]);
    }
}
