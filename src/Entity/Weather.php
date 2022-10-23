<?php

namespace App\Entity;

use App\Repository\WeatherRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeatherRepository::class)]
class Weather
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $Temperature = null;

    #[ORM\Column]
    private ?float $Precipitation = null;

    #[ORM\Column]
    private ?int $OvercastLevel = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\Column]
    private ?float $Wind = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?City $city = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemperature(): ?float
    {
        return $this->Temperature;
    }

    public function setTemperature(float $Temperature): self
    {
        $this->Temperature = $Temperature;

        return $this;
    }

    public function getPrecipitation(): ?float
    {
        return $this->Precipitation;
    }

    public function setPrecipitation(float $Precipitation): self
    {
        $this->Precipitation = $Precipitation;

        return $this;
    }

    public function getOvercastLevel(): ?int
    {
        return $this->OvercastLevel;
    }

    public function setOvercastLevel(int $OvercastLevel): self
    {
        $this->OvercastLevel = $OvercastLevel;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getWind(): ?float
    {
        return $this->Wind;
    }

    public function setWind(float $Wind): self
    {
        $this->Wind = $Wind;

        return $this;
    }

    public function getCity(): ?city
    {
        return $this->city;
    }

    public function setCity(?city $city): self
    {
        $this->city = $city;

        return $this;
    }
}
