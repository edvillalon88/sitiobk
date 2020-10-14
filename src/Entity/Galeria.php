<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GaleriaRepository")
 */
class Galeria
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
    private $titulo;

    /** @ORM\Column(type="string", length=180) */
    private $tituloEn;

    /** @ORM\Column(type="text") */
    private $descripcion;

    /** @ORM\Column(type="text") */
    private $descripcionEn;

    /** @ORM\Column(type="string", length=180, nullable=true) */
    private $imagen;

    /**
     * @ORM\ManyToOne(targetEntity="ProyectoTipo", inversedBy="galerias", cascade={"persist"})
     * @ORM\JoinColumn(name="proyecto_tipo_id", referencedColumnName="id")
     */
    private $tipo;

    public function __construct()
    {

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
     * @param mixed $tituloEn
     */
    public function setTituloEn($tituloEn)
    {
        $this->tituloEn = $tituloEn;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getDescripcionEn()
    {
        return $this->descripcionEn;
    }

    /**
     * @param mixed $descripcionEn
     */
    public function setDescripcionEn($descripcionEn)
    {
        $this->descripcionEn = $descripcionEn;
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

    public function __toString()
    {
        return $this->getTitulo();
    }
}
