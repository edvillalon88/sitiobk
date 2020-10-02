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
        $encuesta->setNombre('Encuesta al Cliente');
        $encuesta->setCodigo('R-07-1-4');
        $encuesta->setRev('2');
        $encuesta->setLogo('...');
        $encuesta->setDescripCabecera('Estimado cliente, unos minutos de su tiempo nos ayuda a mejorar.'. 
        'La encuesta que le presentamos a continuación forma parte de un '.
        'estudio para conocer su grado de satisfacción con relación a la '.
        'Calidad de los Servicios que recibe de nuestra Empresa. '.
        'Su opinión nos será de inestimable ayuda para la mejora continua de los mismos. ' .
        'Muchas Gracias');
        $encuesta->setDescripFinal('Tenga la bondad de devolver este cuestionario a traves de la via que '. 
        'considere adecuada, preferiblemente a traves de nuestros empleados '.
        'o por e-mail a las direcciones siguientes: elysd@bkimp.co.cu; josep@bkimp.co.cu '.
        'Nota: Puede escribir al dorso.');

        $manager->persist($encuesta);

        $tipos = [
            array('tipo'=>'Descripcion','respuestas'=>''),
            array('tipo'=>'Literal','respuestas'=>'M,R,B,MB'),
            array('tipo'=>'Bandera','respuestas'=>'SI,NO'),
            array('tipo'=>'Servicios','respuestas'=>'Servicios de Importación,Servicios de Exportación,Otros'),
            array('tipo'=>'Recomendación','respuestas'=>'Sin dudas lo recomendaría,No lo haría,Lo pensaría'),
        ];

        //Llenar los enunciados para preguntas literales
        $preguntasLiteral = [
            array('enunciado'=>'1. Atención de nuestro personal en recepción o por teléfono.'),
            array('enunciado'=>'2. Eficacia del proceso de contratación.'),
            array('enunciado'=>'3. Eficacia de la entrega del material contratado.'),
            array('enunciado'=>'4. Desempeño y profesionalidad del personal que lo atendió.'),
            array('enunciado'=>'5. Eficiencia del proceso de Facturación.'),
            array('enunciado'=>'6. Calidad del servicio recibido.'),
            array('enunciado'=>'7. Satisfacción con el servicio prestado.'),
        ];
 

        //Crear arreglo para preguntas descripcion
        $preguntasDescripcion = [
           array('enunciado'=>'Expectativas insatisfechas:'),
           array('enunciado'=>'Aspectos que considere se pueden mejorar:'),
        ];

        //Crear arreglo para preguntas bandera
        $preguntasBandera = [
           array('enunciado'=>'Solicitaría nuevamente nuestros servicios:'),
        ];

        //Crear arreglo para preguntas de servicio
         $preguntasServicio = [
            array('enunciado'=>'Cuál de nuestros servicios ha utilizado?'),
                                 
        ];

        //Crear arreglo para preguntas recomendación
         $preguntasRecomendacion = [
            array('enunciado'=>'Recomendaría usted nuestros servicios a otros '.
            'empresarios o entidades que lo necesiten y les hayan consultado?'),
                               
        ];

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
                case 'Descripcion':
                    for($a = 0; $a < count($preguntasDescripcion); $a++){
                        //Crear la pregunta
                        $pregunta = new Pregunta();
                        $pregunta->setEnunciado($preguntasDescripcion[$a]['enunciado']);
                        $pregunta->setTipo($tipo);

                        //Crear la relación
                        $relacion = new EncuestaPregunta();
                        $relacion->setEncuesta($encuesta);
                        $relacion->setPregunta($pregunta);

                        $manager->persist($pregunta);
                        $manager->persist($relacion);
                    }
                break;

                case 'Bandera':
                    for($a = 0; $a < count($preguntasBandera); $a++){
                        //Crear la pregunta
                        $pregunta = new Pregunta();
                        $pregunta->setEnunciado($preguntasBandera[$a]['enunciado']);
                        $pregunta->setTipo($tipo);

                        //Crear la relación
                        $relacion = new EncuestaPregunta();
                        $relacion->setEncuesta($encuesta);
                        $relacion->setPregunta($pregunta);

                        $manager->persist($pregunta);
                        $manager->persist($relacion);
                    }
                break;

                case 'Servicios':
                    for($a = 0; $a < count($preguntasServicio); $a++){
                        //Crear la pregunta
                        $pregunta = new Pregunta();
                        $pregunta->setEnunciado($preguntasServicio[$a]['enunciado']);
                        $pregunta->setTipo($tipo);

                        //Crear la relación
                        $relacion = new EncuestaPregunta();
                        $relacion->setEncuesta($encuesta);
                        $relacion->setPregunta($pregunta);

                        $manager->persist($pregunta);
                        $manager->persist($relacion);
                    }
                break;

                case 'Recomendación':
                    for($a = 0; $a < count($preguntasRecomendacion); $a++){
                        //Crear la pregunta
                        $pregunta = new Pregunta();
                        $pregunta->setEnunciado($preguntasRecomendacion[$a]['enunciado']);
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
