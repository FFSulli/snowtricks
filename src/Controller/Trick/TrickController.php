<?php

namespace App\Controller\Trick;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{
    /**
     * @Route("/tricks", name="tricks_index")
     */
    public function index(): Response
    {
        return $this->render('tricks/index.html.twig');
    }
}
