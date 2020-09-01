<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotaRepository")
 */
class Nota
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**     
     * @ORM\Column(name="fecha_hora", type="datetime", nullable=true) 
     */
    private $fechaHora;

    /** @ORM\Column(type="string", length=180) */
    private $titulo;

    /** @ORM\Column(type="string", length=180) */
    private $titulo_en;

    /** @ORM\Column(type="string", length=180) */
    private $subtitulo;

    /** @ORM\Column(type="string", length=180) */
    private $subtitulo_en;

    /** @ORM\Column(type="text") */
    private $contenido;

    /** @ORM\Column(type="text") */
    private $contenido_en;

    /** @ORM\Column(type="string", length=180) */
    private $imagen;

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
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getTituloEn()
    {
        return $this->titulo_en;
    }

    /**
     * @param mixed $titulo_en
     */
    public function setTituloEn($titulo_en)
    {
        $this->titulo_en = $titulo_en;
    }

    /**
     * @return mixed
     */
    public function getSubtitulo()
    {
        return $this->subtitulo;
    }

    /**
     * @param mixed $subtitulo
     */
    public function setSubtitulo($subtitulo)
    {
        $this->subtitulo = $subtitulo;
    }

    /**
     * @return mixed
     */
    public function getSubtituloEn()
    {
        return $this->subtitulo_en;
    }

    /**
     * @param mixed $subtitulo_en
     */
    public function setSubtituloEn($subtitulo_en)
    {
        $this->subtitulo_en = $subtitulo_en;
    }

    /**
     * @return mixed
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * @param mixed $contenido
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    /**
     * @return mixed
     */
    public function getContenidoEn()
    {
        return $this->contenido_en;
    }

    /**
     * @param mixed $contenido_en
     */
    public function setContenidoEn($contenido_en)
    {
        $this->contenido_en = $contenido_en;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    
  
    public function __toString()
    {
        return $this->getTitulo();
    }
}
