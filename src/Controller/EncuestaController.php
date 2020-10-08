<?php

namespace App\Controller;

use App\Entity\Encuesta;
use App\Entity\EncuestaPregunta;

use App\Repository\EncuestaRepository;
use App\Repository\EncuestaPreguntaRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/encuesta")
 */
class EncuestaController extends AbstractController
{
    /**
     * @Route("/new", name="encuesta_new", methods={"GET"})
     */
    public function new(EncuestaRepository $encuestaRep,
                    EncuestaPreguntaRepository $encPregRep)
    {
        $encuestas = $encuestaRep->findAll();

        $primera = $encuestas[0];

        $preguntas = $encPregRep->findBy(
            array('encuesta' => $primera),
            array('orden' => 'ASC')
        );

        return $this->render('encuesta/new.html.twig', [
            'encuesta' => $primera,
            'preguntas' => $preguntas
        ]);
    }

}
