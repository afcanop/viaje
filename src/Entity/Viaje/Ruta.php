<?php

namespace App\Entity\Viaje;

use App\Repository\Viaje\RutaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RutaRepository::class)
 */
class Ruta
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombreCompleto;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Abrebiatura;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreCompleto(): ?string
    {
        return $this->nombreCompleto;
    }

    public function setNombreCompleto(?string $nombreCompleto): self
    {
        $this->nombreCompleto = $nombreCompleto;

        return $this;
    }

    public function getAbrebiatura(): ?string
    {
        return $this->Abrebiatura;
    }

    public function setAbrebiatura(string $Abrebiatura): self
    {
        $this->Abrebiatura = $Abrebiatura;

        return $this;
    }
}
