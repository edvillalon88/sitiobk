<?php

namespace App\Entity;

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
     * @ORM\Column(name="fechaHora", type="datetime", nullable=true) 
     */
    private $fechaHora;

    /** @ORM\Column(type="string", length=180) */
    private $titulo;

    /** @ORM\Column(type="string", length=180) */
    private $tituloEn;

    /** @ORM\Column(type="string", length=180) */
    private $subtitulo;

    /** @ORM\Column(type="string", length=180) */
    private $subtituloEn;

    /** @ORM\Column(type="text") */
    private $contenido;

    /** @ORM\Column(type="text") */
    private $contenidoEn;

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
        return $this->tituloEn;
    }

    /**
     * @param mixed $titulo_en
     */
    public function setTituloEn($tituloEn)
    {
        $this->tituloEn = $tituloEn;
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
        return $this->subtituloEn;
    }

    /**
     * @param mixed $subtitulo_en
     */
    public function setSubtituloEn($subtituloEn)
    {
        $this->subtituloEn = $subtituloEn;
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
        return $this->contenidoEn;
    }

    /**
     * @param mixed $contenidoEn
     */
    public function setContenidoEn($contenidoEn)
    {
        $this->contenidoEn = $contenidoEn;
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
