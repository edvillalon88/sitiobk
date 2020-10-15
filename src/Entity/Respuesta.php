<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RespuestaRepository")
 */
class Respuesta
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**     
     * @ORM\Column(name="fechaHora", type="datetime", nullable=true) 
     */
    private $fechaHora;

    /** @ORM\Column(type="string", length=180) */
    private $empresa;

    /**
     * @ORM\ManyToOne(targetEntity="Encuesta", inversedBy="respuestas", cascade={"persist"})
     * @ORM\JoinColumn(name="encuesta_id", referencedColumnName="id") 
     */
    private $encuesta;

    /**
    * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="respuestas", cascade={"persist"})
    * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id") 
    */
    private $cliente;

    /**
     * Many Encuesta has Many Pregunta.
     * @ORM\OneToMany(targetEntity="RespuestaPregunta", mappedBy="respuesta", cascade={"remove"})
     */
    private $respuestasPreguntas; 

    public function __construct()
    {
        $this->respuestasPreguntas = new ArrayCollection();
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
    public function getFechaHora()
    {
        return $this->fechaHora;
    }

    /**
     * @param mixed $fechaHora
     */
    public function setFechaHora($fechaHora)
    {
        $this->fechaHora = $fechaHora;
    }

    /**
     * @return mixed
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * @param mixed $empresa
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
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
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return mixed
     */
    public function getRespuestasPreguntas()
    {
        return $this->respuestasPreguntas;
    }

    /**
     * @param mixed $respuestasPreguntas
     */
    public function setRespuestasPreguntas($respuestasPreguntas)
    {
        $this->respuestasPreguntas = $respuestasPreguntas;
    }

    public function __toString()
    {
        return $this->getId();
    }
}
