<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProyectoTipoRepository")
 */
class ProyectoTipo
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /** @ORM\Column(type="string", length=180) */
    private $tipo;

    /**
     * Many Proyectos has One Tipo.
     * @ORM\OneToMany(targetEntity="Proyecto", mappedBy="tipo", cascade={"remove"})
     */
    private $proyectos;

    /**
     * Many Proyectos has One Tipo.
     * @ORM\OneToMany(targetEntity="Galeria", mappedBy="tipo", cascade={"remove"})
     */
    private $galerias;

    public function __construct()
    {
        $this->proyectos = new ArrayCollection();
        $this->galerias = new ArrayCollection();
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

    /**
     * @return mixed
     */
    public function getGalerias()
    {
        return $this->galerias;
    }

    /**
     * @param mixed $galerias
     */
    public function setGalerias($galerias)
    {
        $this->galerias = $galerias;
    }    

    public function __toString()
    {
        return $this->getTipo();
    }
}
