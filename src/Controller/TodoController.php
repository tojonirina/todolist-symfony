<?php
/**
 * All annotation route options:
 * - name = "route_name"
 * - methods = {"GET", "POST", ...}
 * - requirements = {"param" : "regEx", ...}
 * - schemes={"https", "http"}
 * - stateless=false|true
 * - host = "exemple.com"
 * - defaults={"param" : "value", ...}
 * - conditions = {"context or request"}
 * - priority = number
 * 
 * Special parameters:
 * - _controller
 * - _format
 * - _locale
 */
namespace App\Controller;

use App\Entity\Todo;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/todos", name="todo_")
 */
class TodoController extends AbstractController
{
    private $todos = [];
    /**
     * @Route("", name="list", methods={"GET","HEAD"})
     */
    public function list(ManagerRegistry $manager): Response
    {
        $todos = $manager->getRepository(Todo::class)->findAll();

        return $this->json($this->todos);
    }

    /**
     * @Route("/{id}", name="show_detail", requirements={"id":"\d+"})
     */
    public function show(Todo $id): Response
    {
        return $this->json($id);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(Request $request, ManagerRegistry $manager): Response
    {
        $entityManager = $manager->getManager();

        $todo = new Todo();
        $todo->setTodo($request->request->get('todo'));
        $todo->setDescription($request->request->get('description'));
        $todo->setStatus(true);
        $todo->setDeleted(false);

        $entityManager->persist($todo);

        $entityManager->flush();

        $this->addFlash('notice', 'Well!');
        return $this->redirectToRoute('todo_index');
    }
}
