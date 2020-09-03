<?php

namespace App\DataFixtures;

use App\Entity\PreguntaTipo;
use App\Entity\Pregunta;
use App\Entity\Encuesta;
use App\Entity\EncuestaPregunta;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EncuestaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Llenar los set de Encuesta
        $encuesta = new Encuesta();
        $encuesta->setNombre('...');
        $encuesta->setCodigo('...');
        $encuesta->setRev('...');
        $encuesta->setLogo('...');
        $encuesta->setDescripCabecera('...');
        $encuesta->setDescripFinal('...');
        //Despues que se llene los set de la encuesta
        //descomentariar el persist siguiente
        //$manager->persist($encuesta);

        $tipos = [
            array('tipo'=>'Descripcion','respuestas'=>''),
            array('tipo'=>'Literal','respuestas'=>'M,R,B,MB'),
            array('tipo'=>'Bandera','respuestas'=>'SI,NO'),
            array('tipo'=>'De Servicios','respuestas'=>'Servicios de Importación,Servicios de Exportación,Otros'),
            array('tipo'=>'Recomendación','respuestas'=>'Sin dudas lo recomendaría,No lo haría,Lo pensaría'),
        ];

        //Llenar los enunciados para preguntas literales
        $preguntasLiteral = [
            array('enunciado'=>'1. Atención de nuestro....'),
        ];

        //Crear arreglo para preguntas bandera
        $preguntasBandera = [
            array('enunciado'=>''),
        ];

        //Crear arreglo para preguntas de servicio

        //Crear arreglo para preguntas recomendación

        //Seguir este ciclo y los que estan dentro
        for($i = 0; $i < count($tipos); $i++){
            $tipo = new PreguntaTipo();
            $tipo->setTipo($tipos[$i]['tipo']);
            $tipo->setRespuestas($tipos[$i]['respuestas']);
            $manager->persist($tipo);

            switch($tipo->getTipo()) {

                //Completar el switch con todos los case necesarios
                case 'Literal':
                    for($a = 0; $a < count($preguntasLiteral); $a++){
                        //Crear la pregunta
                        $pregunta = new Pregunta();
                        $pregunta->setEnunciado($preguntasLiteral[$a]['enunciado']);
                        $pregunta->setTipo($tipo);

                        //Crear la relación
                        $relacion = new EncuestaPregunta();
                        $relacion->setEncuesta($encuesta);
                        $relacion->setPregunta($pregunta);

                        $manager->persist($pregunta);
                        $manager->persist($relacion);
                    }
                break;

            }

        }

        $manager->flush();
    }
}
