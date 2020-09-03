<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EncuestaRepository")
 */
class Encuesta
{
    /**
     * @var \Ramsey\Uuid\UuidInterface
     *
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /** @ORM\Column(type="string", length=180) */
    private $nombre;

    /** @ORM\Column(type="string", length=180) */
    private $logo;

    /** @ORM\Column(type="string", length=180) */
    private $codigo;

    /** @ORM\Column(type="string", length=180) */
    private $rev;    

    /** @ORM\Column(type="text") */
    private $descripCabecera;

    /** @ORM\Column(type="text") */
    private $descripFinal;

    /**
     * Many Encuesta has Many Pregunta.
     * @ORM\OneToMany(targetEntity="EncuestaPregunta", mappedBy="encuesta", cascade={"remove"})
     */
    private $preguntas; 

    /**
     * Many Encuesta has Many Respuesta.
     * @ORM\OneToMany(targetEntity="Respuesta", mappedBy="encuesta", cascade={"remove"})
     */
    private $respuestas; 

    public function __construct()
    {
        $this->preguntas = new ArrayCollection();
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getRev()
    {
        return $this->rev;
    }

    /**
     * @param mixed $rev
     */
    public function setRev($rev)
    {
        $this->rev = $rev;
    }

    /**
     * @return mixed
     */
    public function getDescripCabecera()
    {
        return $this->descripCabecera;
    }

    /**
     * @param mixed $descripCabecera
     */
    public function setDescripCabecera($descripCabecera)
    {
        $this->descripCabecera = $descripCabecera;
    }

    /**
     * @return mixed
     */
    public function getDescripFinal()
    {
        return $this->descripFinal;
    }

    /**
     * @param mixed $descripFinal
     */
    public function setDescripFinal($descripFinal)
    {
        $this->descripFinal = $descripFinal;
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

    public function __toString()
    {
        return $this->getNombre();
    }
}
