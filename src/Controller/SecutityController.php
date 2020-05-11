<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SecutityController extends AbstractController
{
     /**
      *@Route("/{vueRouting}", requirements={"vueRouting"="^(?!api|_(profiler|wdt)).*"}, name="index")
     */
    public function index()
    {
        return $this->render('base.html.twig', []);
    }
    
    
    // /**
    //  *@Route("/", name="login")
    //  */
    // public function loggin()
    // {
    //     return $this->render('login.html.twig', []);
    // }
}
