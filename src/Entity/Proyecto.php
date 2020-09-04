<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProyectoRepository")
 */
class Proyecto
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
    private $alcance;

    /**
     * @ORM\ManyToOne(targetEntity="ProyectoTipo", inversedBy="proyectos", cascade={"persist"})
     * @ORM\JoinColumn(name="proyecto_tipo_id", referencedColumnName="id")
     */
    private $tipo;

        /**
     * @ORM\ManyToOne(targetEntity="Renglon", inversedBy="proyectos", cascade={"persist"})
     * @ORM\JoinColumn(name="renglon_id", referencedColumnName="id")
     */
    private $renglon;

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
    public function getAlcance()
    {
        return $this->alcance;
    }

    /**
     * @param mixed $alcance
     */
    public function setAlcance($alcance)
    {
        $this->alcance = $alcance;
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
    public function getRenglon()
    {
        return $this->renglon;
    }

    /**
     * @param mixed $renglon
     */
    public function setRenglon($renglon)
    {
        $this->renglon = $renglon;
    }

    public function __toString()
    {
        return $this->getNombre();
    }
}
