<?php

namespace App\Controller;

use App\Entity\Todo;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="todo_index", methods={"GET", "HEAD"})
     */
    public function index(ManagerRegistry $manager): Response
    {
        $todos = $manager->getRepository(Todo::class)->findAll();
        return $this->render('index/index.html.twig', ['todos' => $todos]);
    }
}
