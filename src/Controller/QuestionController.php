<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class QuestionController
{
    public function homepage()
    {
        return new Response("Our first page to understand route / controller and Response ");
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