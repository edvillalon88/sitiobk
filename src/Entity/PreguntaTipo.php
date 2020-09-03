<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PreguntaTipoRepository")
 */
class PreguntaTipo
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /** @ORM\Column(type="string", length=180) */
    private $tipo;

    /** @ORM\Column(type="string", length=1000) */
    private $respuestas;

    /**
     * Many Pregunta has Many Encuesta.
     * @ORM\OneToMany(targetEntity="Pregunta", mappedBy="tipo", cascade={"remove"})
     */
    private $preguntas;

    public function __construct()
    {
        $this->preguntas = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getRespuestas()
    {
        return $this->respuestas;
    }

    /**
     * @param mixed $respuestas
     */
    public function setRespuestas($respuestas)
    {
        $this->respuestas = $respuestas;
    }

    /**
     * @return mixed
     */
    public function getPreguntas()
    {
        return $this->preguntas;
    }

    /**
     * @param mixed $preguntas
     */
    public function setPreguntas($preguntas)
    {
        $this->preguntas = $preguntas;
    }

    public function __toString()
    {
        return $this->getTipo();
    }
}
