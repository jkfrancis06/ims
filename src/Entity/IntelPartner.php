<?php

namespace App\Entity;

use App\Repository\IntelPartnerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IntelPartnerRepository::class)
 */
class IntelPartner
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=Courrier::class, mappedBy="sender")
     */
    private $courriers;

    /**
     * @ORM\OneToMany(targetEntity=Courrier::class, mappedBy="receiver")
     */
    private $recuCourriers;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();

        $this->courriers = new ArrayCollection();
        $this->recuCourriers = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|Courrier[]
     */
    public function getCourriers(): Collection
    {
        return $this->courriers;
    }

    public function addCourrier(Courrier $courrier): self
    {
        if (!$this->courriers->contains($courrier)) {
            $this->courriers[] = $courrier;
            $courrier->setSender($this);
        }

        return $this;
    }

    public function removeCourrier(Courrier $courrier): self
    {
        if ($this->courriers->removeElement($courrier)) {
            // set the owning side to null (unless already changed)
            if ($courrier->getSender() === $this) {
                $courrier->setSender(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Courrier[]
     */
    public function getRecuCourriers(): Collection
    {
        return $this->recuCourriers;
    }

    public function addRecuCourrier(Courrier $recuCourrier): self
    {
        if (!$this->recuCourriers->contains($recuCourrier)) {
            $this->recuCourriers[] = $recuCourrier;
            $recuCourrier->setReceiver($this);
        }

        return $this;
    }

    public function removeRecuCourrier(Courrier $recuCourrier): self
    {
        if ($this->recuCourriers->removeElement($recuCourrier)) {
            // set the owning side to null (unless already changed)
            if ($recuCourrier->getReceiver() === $this) {
                $recuCourrier->setReceiver(null);
            }
        }

        return $this;
    }
}
