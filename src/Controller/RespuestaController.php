<?php

namespace App\Controller;

use App\Entity\Encuesta;
use App\Entity\EncuestaPregunta;
use App\Entity\Respuesta;
use App\Entity\RespuestaPregunta;

use App\Repository\ClienteRepository;
use App\Repository\RespuestaRepository;
use App\Repository\RespuestaPreguntaRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/admin/encuesta")
 */
class RespuestaController extends AbstractController
{
    /**
     * @Route("/", name="encuesta_index", methods={"GET"})
     */
    public function index(RespuestaRepository $respuestaRep)
    {
        return $this->render('encuesta/index.html.twig', [
            'respuestas' => $respuestaRep->findAll(),
            'error'=>''
        ]);
    }

    /**
     * @Route("/{id}/show", name="encuesta_show", methods={"GET"})
     */
    public function show(RespuestaRepository $respuestaRep, 
    RespuestaPreguntaRepository $respPregRep, $id)
    {
        $respuesta = $respuestaRep->find($id);

        $respuestas = $respPregRep->findBy(
            array('respuesta' => $respuesta)
        );

        return $this->render('encuesta/show.html.twig', [
            'respuesta' => $respuesta,
            'respuestas' => $respuestas
        ]);
    }

}
