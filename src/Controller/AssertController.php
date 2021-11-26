<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AssertController extends AbstractController
{
    /**
     * @Route("/assert/{assert}", name="assert")
     */
    public function index($assert): Response
    {
        return $this->render('assert/'.$assert);
    }
}
