<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EncuestaPreguntaRepository")
 */
class EncuestaPregunta
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Encuesta", inversedBy="preguntas", cascade={"persist"})
     * @ORM\JoinColumn(name="encuesta_id", referencedColumnName="id") 
     */
    private $encuesta;

    /**
    * @ORM\ManyToOne(targetEntity="Pregunta", inversedBy="encuestas", cascade={"persist"})
    * @ORM\JoinColumn(name="pregunta_id", referencedColumnName="id") 
    */
    private $pregunta;

    /**
     * Many Encuestas Preguntas has Many Respuestas.
     * @ORM\OneToMany(targetEntity="RespuestaPregunta", mappedBy="encuestaPregunta", cascade={"remove"})
     */
    private $respuestas; 

    public function __construct()
    {
        $this->respuestas = new ArrayCollection();
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
    public function getEncuesta()
    {
        return $this->encuesta;
    }

    /**
     * @param mixed $encuesta
     */
    public function setEncuesta($encuesta)
    {
        $this->encuesta = $encuesta;
    }

        /**
     * @return mixed
     */
    public function getPregunta()
    {
        return $this->pregunta;
    }

    /**
     * @param mixed $pregunta
     */
    public function setPregunta($pregunta)
    {
        $this->pregunta = $pregunta;
    }

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

    public function __toString()
    {
        return $this->getId();
    }
}
