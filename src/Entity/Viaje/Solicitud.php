<?php

namespace App\Entity\Viaje;

use App\Repository\Viaje\SolicitudRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SolicitudRepository::class)
 */
class Solicitud
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(name="numero_contacto" ,type="string",length=30)
     */
    private $numeroContacto;

    /**
     * @ORM\Column(name="contacto", type="string", length=30)
     */
    private $Contacto;

    /**
     * @ORM\Column(name="fecha_solicitud", type="date", length=30)
     */
    private $fechaSolicitud;

    /**
     * @ORM\Column(name="fecha_creacion", type="date", length=30)
     */
    private $fechaCreacion;

    /**
     * @ORM\Column(name="comentarios", type="string", length=200, nullable=true)
     */
    private $comentarios;

    /**
     * @ORM\Column(name="estado_aprobado", type="boolean",options={"default" : false}, nullable=true)
     */
    private $estadoAprobado = false;

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
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNumeroContacto()
    {
        return $this->numeroContacto;
    }

    /**
     * @param mixed $numeroContacto
     */
    public function setNumeroContacto($numeroContacto): void
    {
        $this->numeroContacto = $numeroContacto;
    }

    /**
     * @return mixed
     */
    public function getContacto()
    {
        return $this->Contacto;
    }

    /**
     * @param mixed $Contacto
     */
    public function setContacto($Contacto): void
    {
        $this->Contacto = $Contacto;
    }

    /**
     * @return mixed
     */
    public function getFechaSolicitud()
    {
        return $this->fechaSolicitud;
    }

    /**
     * @param mixed $fechaSolicitud
     */
    public function setFechaSolicitud($fechaSolicitud): void
    {
        $this->fechaSolicitud = $fechaSolicitud;
    }

    /**
     * @return mixed
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * @param mixed $fechaCreacion
     */
    public function setFechaCreacion($fechaCreacion): void
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    /**
     * @return mixed
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * @param mixed $comentarios
     */
    public function setComentarios($comentarios): void
    {
        $this->comentarios = $comentarios;
    }

    /**
     * @return mixed
     */
    public function getEstadoAprobado()
    {
        return $this->estadoAprobado;
    }

    /**
     * @param bool $estadoAprobado
     */
    public function setEstadoAprobado($estadoAprobado): void
    {
        $this->estadoAprobado = $estadoAprobado;
    }




}
