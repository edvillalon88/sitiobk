<?php

namespace App\Controller;

use App\Entity\EnumEstado;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $username;

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        if(!empty($this->getUser())) {

            $isAdmin = in_array("ROLE_ADMINISTRADOR", $this->getUser()->getRoles());

            if($isAdmin) {
                return $this->render('home/indexAdmin.html.twig', [
                    'data'=>0,
                    'consultas'=>0,
                    'reviciones'=>0,
                    'totalMoney'=>0,
                    'cancelas'=>0,
                    'realizadas'=>0,
                    'pendientes'=>0
                ]);
            }
            else {
                return $this->render('home/indexClient.html.twig', [
                    'client_name' => 'Hello Loco'
                ]);
            }

        } else {
            return $this->render('home/indexClient.html.twig', [
                'client_name' => ''
            ]);
        }
        

    }
}
