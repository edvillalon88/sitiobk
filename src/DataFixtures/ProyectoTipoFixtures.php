<?php

namespace App\DataFixtures;

use App\Entity\ProyectoTipo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProyectoTipoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $tipos = [
            array('tipo'=>'Importación',),
            array('tipo'=>'Exportación'),
           ];

        for($i = 0; $i < count($tipos); $i++){
            $tipo = new ProyectoTipo();
            $tipo->setTipo($tipos[$i]['tipo']);
            $manager->persist($tipo);

        }

        $manager->flush();
    }
}
