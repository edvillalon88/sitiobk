<?php

namespace App\Controller;

use App\Entity\EnumEstado;

use App\Repository\ProveedorRepository;
use App\Repository\RenglonRepository;
use App\Repository\ClienteRepository;
use App\Repository\NoticiaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    private $username;

    /**
     * @Route("/{_locale}",
     *     name="home",
     *     requirements={
     *         "_locale": "es|en",
     *     } )
     */
    public function index(RenglonRepository $renglonRep,
        ClienteRepository $clienteRep,
        NoticiaRepository $noticiaRep, $_locale = 'es')
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
                    'renglones' => $renglonRep->findAll(),
                    'clientes' => $clienteRep->findAll(),
                    'noticia' => $noticiaRep->find(1),
                    'locale' => $_locale
                ]);
            }

        } else {
            return $this->render('home/indexClient.html.twig', [
                'renglones' => $renglonRep->findAll(),
                'clientes' => $clienteRep->findAll(),
                'noticia' => $noticiaRep->find(1),
                'locale' => $_locale
            ]);
        }
    }

    /**
     * @Route("/mercadotecnia", name="mercadotecnia")
     */
    public function mercado(ProveedorRepository $proveedorRep)
    {
        return $this->render('home/mercado.html.twig', [
            'proveedores' => $proveedorRep->findAll(),
        ]);
    }

    /**
     * @Route("/importaciones", name="importaciones")
     */
    public function importacion()
    {
        return $this->render('home/importacion.html.twig', []);
    }

    /**
     * @Route("/exportaciones", name="exportaciones")
     */
    public function exportacion()
    {
        return $this->render('home/exportacion.html.twig', []);
    }

    /**
     * @Route("/logistica", name="logistica")
     */
    public function logistica()
    {
        return $this->render('home/logistica.html.twig', []);
    }

    /**
     * @Route("/contacto", name="contacto")
     */
    public function contacto()
    {
        return $this->render('home/contacto.html.twig', []);
    }

}
