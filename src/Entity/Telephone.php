<?php

namespace App\Entity;


use App\Repository\TelephoneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass=TelephoneRepository::class)
 */
class Telephone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $numero;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $fichierCdr;

    /**
     * @ORM\ManyToMany(targetEntity=Personne::class, mappedBy="telephone")
     */
    public $personnes;

    /**
     * @var UploadedFile
     */
    protected $file;


    public function __construct()
    {
        $this->personnes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getFichierCdr(): ?string
    {
        return $this->fichierCdr;
    }

    public function setFichierCdr(?string $fichierCdr): self
    {
        $this->fichierCdr = $fichierCdr;

        return $this;
    }

    /**
     * @return Collection|Personne[]
     */
    public function getPersonnes(): Collection
    {
        return $this->personnes;
    }

    public function addPersonne(Personne $personne): self
    {
        if (!$this->personnes->contains($personne)) {
            $this->personnes[] = $personne;
            $personne->addTelephone($this);
        }

        return $this;
    }

    public function removePersonne(Personne $personne): self
    {
        if ($this->personnes->removeElement($personne)) {
            $personne->removeTelephone($this);
        }

        return $this;
    }

    /**
     * @param UploadedFile $file - Uploaded File
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
}
