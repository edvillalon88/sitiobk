<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RenglonRepository")
 */
class Renglon
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
    private $nombreEn;

    /** @ORM\Column(type="text") */
    private $descripcion;

    /** @ORM\Column(type="text") */
    private $descripcionEn;

    /** @ORM\Column(type="string", length=180, nullable=true) */
    private $imagen;

    /**
     * Many Proyectos has One Renglon.
     * @ORM\OneToMany(targetEntity="Proyecto", mappedBy="renglon", cascade={"remove"})
     */
    private $proyectos;

    public function __construct()
    {
        $this->proyectos = new ArrayCollection();
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
    public function getNombreEn()
    {
        return $this->nombreEn;
    }

    /**
     * @param mixed $nombreEn
     */
    public function setNombreEn($nombreEn)
    {
        $this->nombreEn = $nombreEn;
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
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProyectos()
    {
        return $this->proyectos;
    }

    /**
     * @param mixed $proyectos
     */
    public function setProyectos($proyectos)
    {
        $this->proyectos = $proyectos;
    }

    public function __toString()
    {
        return $this->getNombre();
    }
}
