<?php

namespace App\DataFixtures;

use App\Entity\Continente;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ContinenteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $continentes = [
            array('nombre'=>'Norte América','nombreEn'=>'North America'),
            array('nombre'=>'Sur América','nombreEn'=>'South America'),
            array('nombre'=>'Europa','nombreEn'=>'Europe'),
            array('nombre'=>'Asia','nombreEn'=>'Asia'),
            array('nombre'=>'África','nombreEn'=>'Africa'),
            array('nombre'=>'Oceanía','nombreEn'=>'Oceania'),
             ];
        
        for($i = 0; $i < count($continentes); $i++){
            $cont = new Continente();
            $cont->setNombre($continentes[$i]['nombre']);
            $cont->setNombreEn($continentes[$i]['nombreEn']);
            $manager->persist($cont);

        }

        $manager->flush();
    }
}
