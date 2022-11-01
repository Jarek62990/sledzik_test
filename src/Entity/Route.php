<?php

namespace App\Entity;

use App\Repository\RouteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RouteRepository::class)]
class Route
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'routes')]
    private ?Device $deviceId = null;

    #[ORM\Column]
    private ?float $width = null;

    #[ORM\Column]
    private ?float $hight = null;

    #[ORM\Column(nullable: true)]
    private ?bool $flag = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $updated = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeviceId(): ?Device
    {
        return $this->deviceId;
    }

    public function setDeviceId(?Device $deviceId): self
    {
        $this->deviceId = $deviceId;

        return $this;
    }

    public function getWidth(): ?float
    {
        return $this->width;
    }

    public function setWidth(float $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHight(): ?float
    {
        return $this->hight;
    }

    public function setHight(float $hight): self
    {
        $this->hight = $hight;

        return $this;
    }

    public function isFlag(): ?bool
    {
        return $this->flag;
    }

    public function setFlag(?bool $flag): self
    {
        $this->flag = $flag;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }
}
