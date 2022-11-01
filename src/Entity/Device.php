<?php

namespace App\Entity;

use App\Repository\DeviceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeviceRepository::class)]
class Device
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'devices')]
    private ?User $userId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $deviceNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $deviceFunctions = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'deviceId', targetEntity: Route::class)]
    private Collection $routes;

    public function __construct()
    {
        $this->routes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getDeviceNumber(): ?string
    {
        return $this->deviceNumber;
    }

    public function setDeviceNumber(?string $deviceNumber): self
    {
        $this->deviceNumber = $deviceNumber;

        return $this;
    }

    public function getDeviceFunctions(): ?string
    {
        return $this->deviceFunctions;
    }

    public function setDeviceFunctions(?string $deviceFunctions): self
    {
        $this->deviceFunctions = $deviceFunctions;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Route>
     */
    public function getRoutes(): Collection
    {
        return $this->routes;
    }

    public function addRoute(Route $route): self
    {
        if (!$this->routes->contains($route)) {
            $this->routes->add($route);
            $route->setDeviceId($this);
        }

        return $this;
    }

    public function removeRoute(Route $route): self
    {
        if ($this->routes->removeElement($route)) {
            // set the owning side to null (unless already changed)
            if ($route->getDeviceId() === $this) {
                $route->setDeviceId(null);
            }
        }

        return $this;
    }
}
