<?php

namespace App\Entity;

use App\Repository\TripRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TripRepository::class)
 */
class Trip
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="datetime")
     */
    private $starttime;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endtime;

    /**
     * @ORM\Column(type="integer")
     */
    private $batherNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $boatNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $fishingBoat;

    /**
     * @ORM\Column(type="integer")
     */
    private $pleasureBoat;

    /**
     * @ORM\Column(type="integer")
     */
    private $sailboat;

    /**
     * @ORM\Column(type="integer")
     */
    private $surferNumber;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $pollutionCommentary;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getStarttime(): ?\DateTimeInterface
    {
        return $this->starttime;
    }

    public function setStarttime(\DateTimeInterface $starttime): self
    {
        $this->starttime = $starttime;

        return $this;
    }

    public function getEndtime(): ?\DateTimeInterface
    {
        return $this->endtime;
    }

    public function setEndtime(\DateTimeInterface $endtime): self
    {
        $this->endtime = $endtime;

        return $this;
    }

    public function getBatherNumber(): ?int
    {
        return $this->batherNumber;
    }

    public function setBatherNumber(int $batherNumber): self
    {
        $this->batherNumber = $batherNumber;

        return $this;
    }

    public function getBoatNumber(): ?int
    {
        return $this->boatNumber;
    }

    public function setBoatNumber(int $boatNumber): self
    {
        $this->boatNumber = $boatNumber;

        return $this;
    }

    public function getFishingBoat(): ?int
    {
        return $this->fishingBoat;
    }

    public function setFishingBoat(int $fishingBoat): self
    {
        $this->fishingBoat = $fishingBoat;

        return $this;
    }

    public function getPleasureBoat(): ?int
    {
        return $this->pleasureBoat;
    }

    public function setPleasureBoat(int $pleasureBoat): self
    {
        $this->pleasureBoat = $pleasureBoat;

        return $this;
    }

    public function getSailboat(): ?int
    {
        return $this->sailboat;
    }

    public function setSailboat(int $sailboat): self
    {
        $this->sailboat = $sailboat;

        return $this;
    }

    public function getSurferNumber(): ?int
    {
        return $this->surferNumber;
    }

    public function setSurferNumber(int $surferNumber): self
    {
        $this->surferNumber = $surferNumber;

        return $this;
    }

    public function getPollutionCommentary(): ?string
    {
        return $this->pollutionCommentary;
    }

    public function setPollutionCommentary(?string $pollutionCommentary): self
    {
        $this->pollutionCommentary = $pollutionCommentary;

        return $this;
    }
}
