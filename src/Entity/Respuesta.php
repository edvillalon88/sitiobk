<?php

namespace App\Entity;

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

    /**
     * @ORM\ManyToOne(targetEntity="EncuestaPregunta", inversedBy="respuestas", cascade={"persist"})
     * @ORM\JoinColumn(name="encuestaPregunta_id", referencedColumnName="id") 
     */
    private $encuestaPregunta;

    /**
    * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="respuestas", cascade={"persist"})
    * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id") 
    */
    private $cliente;

    /** @ORM\Column(type="string", length=180) */
    private $valor;

    public function __construct()
    {

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
