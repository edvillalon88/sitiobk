<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProveedorRepository")
 */
class Proveedor
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
    private $pais;

    /** @ORM\Column(type="string", length=180) */
    private $paisEn;

    /**
     * @ORM\ManyToOne(targetEntity="Continente", inversedBy="proveedores", cascade={"persist"})
     * @ORM\JoinColumn(name="continente_id", referencedColumnName="id")
     */
    private $continente;

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
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * @param mixed $pais
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
    }

    /**
     * @return mixed
     */
    public function getPaisEn()
    {
        return $this->paisEn;
    }

    /**
     * @param mixed $paisEn
     */
    public function setPaisEn($paisEn)
    {
        $this->paisEn = $paisEn;
    }    

    /**
     * @return mixed
     */
    public function getContinente()
    {
        return $this->continente;
    }

    /**
     * @param mixed $continente
     */
    public function setContinente($continente)
    {
        $this->continente = $continente;
    }

    public function __toString()
    {
        return $this->getPais();
    }
}
