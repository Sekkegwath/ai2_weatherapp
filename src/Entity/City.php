<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CityRepository::class)]
class City
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $Name = null;

    #[ORM\Column(length: 100)]
    private ?string $Latitude = null;

    #[ORM\Column(length: 100)]
    private ?string $Longitude = null;

    #[ORM\Column(length: 5)]
    private ?string $CountryCode = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->Latitude;
    }

    public function setLatitude(string $Latitude): self
    {
        $this->Latitude = $Latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->Longitude;
    }

    public function setLongitude(string $Longitude): self
    {
        $this->Longitude = $Longitude;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->CountryCode;
    }

    public function setCountryCode(string $CountryCode): self
    {
        $this->CountryCode = $CountryCode;

        return $this;
    }
}
