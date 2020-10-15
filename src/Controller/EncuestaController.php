<?php

namespace App\Controller;

use App\Entity\Encuesta;
use App\Entity\EncuestaPregunta;
use App\Entity\Respuesta;
use App\Entity\RespuestaPregunta;

use App\Repository\ClienteRepository;
use App\Repository\EncuestaRepository;
use App\Repository\EncuestaPreguntaRepository;
use App\Repository\RespuestaRepository;
use App\Repository\RespuestaPreguntaRepository;

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
            'preguntas' => $preguntas,
            'msg' => ''
        ]);
    }

        /**
     * @Route("/create", name="encuesta_create", methods={"POST"})
     */
    public function create(Request $request, EncuestaRepository $encuestaRep,
                    EncuestaPreguntaRepository $encPregRep,
                    RespuestaRepository $respuestaRep,
                    RespuestaPreguntaRepository $respPregRep, 
                    ClienteRepository $clienteRep)
    {
        $encuestas = $encuestaRep->findAll();
        $primera = $encuestas[0];

        $preguntas = $encPregRep->findBy(
            array('encuesta' => $primera),
            array('orden' => 'ASC')
        );

        $cliente = $clienteRep->findOneBy(
            array('usuario' => $this->getUser())
        );

        $respuesta = new Respuesta();
        $respuesta->setFechaHora(new \DateTime());
        $respuesta->setEmpresa($request->get("empresa"));
        $respuesta->setEncuesta($primera);
        $respuesta->setCliente($cliente);

        $entityManager = $this->getDoctrine()->getManager();

        foreach($preguntas as $pregunta) {
            
            $respuestaP = new RespuestaPregunta();
            $respuestaP->setEncuestaPregunta($pregunta);
            $respuestaP->setRespuesta($respuesta);

            if($pregunta->getOrden() >= 1 && $pregunta->getOrden() <= 7) {
                if($request->get("literal_" . $pregunta->getOrden()) != null)
                    $respuestaP->setValor($request->get("literal_" . $pregunta->getOrden()));
                else
                    $respuestaP->setValor("");
            } 
            else {
                if($request->get($pregunta->getOrden()) != null)
                    $respuestaP->setValor($request->get($pregunta->getOrden()));
                else
                    $respuestaP->setValor("");
            }

            $entityManager->persist($respuestaP);
        }

        
        $entityManager->persist($respuesta);
        
        $entityManager->flush();

        return $this->render('encuesta/new.html.twig', [
            'encuesta' => $primera,
            'preguntas' => $preguntas,
            'msg' => 'Datos de encuesta registrados correctamente'
        ]);
    }

}
