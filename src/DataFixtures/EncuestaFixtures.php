<?php

namespace App\DataFixtures;

use App\Entity\PreguntaTipo;
use App\Entity\Pregunta;
use App\Entity\Encuesta;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EncuestaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Llenar los set de Encuesta
        $encuesta = new Encuesta();


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

        for($i = 0; $i < count($tipos); $i++){
            $tipo = new PreguntaTipo();
            $tipo->setTipo($tipos[$i]['tipo']);
            $tipo->setRespuestas($tipos[$i]['respuestas']);
            $manager->persist($tipo);

            switch($tipo->getTipo()) {

                //Completar el swith con todos los case necesarios
                case 'Literal':
                    for($a = 0; $a < count($preguntasLiteral); $a++){
                        $pregunta = new Pregunta();
                        $pregunta->setEnunciado('...');
                        $pregunta->setTipo($tipo);
                        $manager->persist($pregunta);
                    }
                break;

            }

        }

        $manager->flush();
    }
}
