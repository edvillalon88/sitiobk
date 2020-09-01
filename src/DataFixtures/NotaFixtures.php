<?php

namespace App\DataFixtures;

use App\Entity\Nota;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class NotaFixtures extends Fixture
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
