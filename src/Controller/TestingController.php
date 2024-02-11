<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestingController extends AbstractController
{
    #[Route('/', name: 'app_testing')]
    public function index(): Response
    {
        return $this->render('dashboard.html.twig', [
            'controller_name' => 'TestingController',
        ]);
    }
}