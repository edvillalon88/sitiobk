<?php

namespace App\DataFixtures;

use App\Entity\Noticia;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class NoticiaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $nota = new Noticia();
     
        $nota->setFechaHora(new \DateTime());
     
        $nota->setTitulo('Primera Notica de la Jornada');
        $nota->setTituloEn('First News of the Day');

        $nota->setSubtitulo('Bienvenido a nuestro sitio');
        $nota->setSubtituloEn('Welcome to our site');

        $nota->setContenido('En este espacio aparece la descripción de la noticia relevante de nuestra empresa.');
        $nota->setContenidoEn('In this space appears the description of the relevant news of our company.');

        $nota->setImagen('');

        $manager->persist($nota);
        $manager->flush();
    }
}
