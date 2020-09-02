<?php

namespace App\DataFixtures;

use App\Entity\Encuesta;
use App\Entity\Pregunta;
use App\Entity\EncuestaPregunta;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EncuestaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $nota = new Nota();
     
        $nota->setFechaHora(null);
     
        $nota->setTitulo('');
        $nota->setTituloEn('');

        $nota->setSubtitulo('');
        $nota->setSubtituloEn('');

        $nota->setContenido('');
        $nota->setContenidoEn('');

        $nota->setImagen('');

        $manager->persist($nota);
        $manager->flush();
    }
}
