<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    public function homepage()
    {
        return $this->render('/question/index.html.twig');
    }
    /**
    * @Route("/questions/how-totie-my-shoes-with-magic")
     */
    function show()
    {
        return new Response("new respince");
    }
    /**
     * @Route("/questions/{slug}")
     */
    function show_card($slug)
    {
        return new Response(sprintf('new respindddce "%s"!',$slug));
    }
}