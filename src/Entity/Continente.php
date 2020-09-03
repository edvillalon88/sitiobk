<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContinenteRepository")
 */
class Continente
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /** @ORM\Column(type="string", length=180) */
    private $nombre;

    /** @ORM\Column(type="string", length=180) */
    private $nombreEn;

    /**
     * Many Proveedor has One Continente.
     * @ORM\OneToMany(targetEntity="Proveedor", mappedBy="continente", cascade={"remove"})
     */
    private $proveedores;

    public function __construct()
    {
        $this->proveedores = new ArrayCollection();
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
    public function getProveedores()
    {
        return $this->proveedores;
    }

    /**
     * @param mixed $proveedores
     */
    public function setProveedores($proveedores)
    {
        $this->proveedores = $proveedores;
    }

    public function __toString()
    {
        return $this->getNombre();
    }
}
