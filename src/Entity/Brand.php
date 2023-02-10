<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BrandRepository::class)
 */
class Brand
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=MotorBike::class, mappedBy="brand")
     */
    private $motorBikes;

    public function __construct()
    {
        $this->motorBikes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, MotorBike>
     */
    public function getMotorBikes(): Collection
    {
        return $this->motorBikes;
    }

    public function addMotorBike(MotorBike $motorBike): self
    {
        if (!$this->motorBikes->contains($motorBike)) {
            $this->motorBikes[] = $motorBike;
            $motorBike->setBrand($this);
        }

        return $this;
    }

    public function removeMotorBike(MotorBike $motorBike): self
    {
        if ($this->motorBikes->removeElement($motorBike)) {
            // set the owning side to null (unless already changed)
            if ($motorBike->getBrand() === $this) {
                $motorBike->setBrand(null);
            }
        }

        return $this;
    }
}
