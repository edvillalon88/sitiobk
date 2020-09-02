<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PreguntaRepository")
 */
class Pregunta
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /** @ORM\Column(type="string", length=180) */
    private $enunciado;

    /**
     * Many Pregunta has Many Encuesta.
     * @ORM\OneToMany(targetEntity="EncuestaPregunta", mappedBy="pregunta", cascade={"remove"})
     */
    private $encuestas; 

    public function __construct()
    {
        $this->encuestas = new ArrayCollection();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */ 
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEnunciado()
    {
        return $this->enunciado;
    }

    /**
     * @param mixed $enunciado
     */
    public function setEnunciado($enunciado)
    {
        $this->enunciado = $enunciado;
    }

    /**
     * @return mixed
     */
    public function getEncuestas()
    {
        return $this->encuestas;
    }

    /**
     * @param mixed $encuestas
     */
    public function setEncuestas($encuestas)
    {
        $this->encuestas = $encuestas;
    }

    public function __toString()
    {
        return $this->getEnunciado();
    }
}
