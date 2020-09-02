<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RespuestaPreguntaRepository")
 */
class RespuestaPregunta
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="EncuestaPregunta", inversedBy="respuestas", cascade={"persist"})
     * @ORM\JoinColumn(name="encuestaPregunta_id", referencedColumnName="id") 
     */
    private $encuestaPregunta;

    /**
    * @ORM\ManyToOne(targetEntity="Respuesta", inversedBy="respuestasPreguntas", cascade={"persist"})
    * @ORM\JoinColumn(name="respuesta_id", referencedColumnName="id") 
    */
    private $respuesta;

    /** @ORM\Column(type="string", length=180) */
    private $valor;    


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
    public function getEncuestaPregunta()
    {
        return $this->encuestaPregunta;
    }

    /**
     * @param mixed $encuestaPregunta
     */
    public function setEncuestaPregunta($encuestaPregunta)
    {
        $this->encuestaPregunta = $encuestaPregunta;
    }

    /**
     * @return mixed
     */
    public function getRespuesta()
    {
        return $this->respuesta;
    }

    /**
     * @param mixed $respuesta
     */
    public function setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function __toString()
    {
        return $this->getValor();
    }
}
