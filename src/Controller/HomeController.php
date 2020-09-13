<?php

namespace App\Controller;

use App\Entity\EnumEstado;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {

        if(!empty($this->getUser())) {
            return $this->render('home/index.html.twig', [
                'data'=>0,
                'consultas'=>0,
                'reviciones'=>0,
                'totalMoney'=>0,
                'cancelas'=>0,
                'realizadas'=>0,
                'pendientes'=>0
            ]);
        } else {
            return $this->render('home/indexNoLogin.html.twig');
        }
        

    }
}
