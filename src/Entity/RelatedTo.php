<?php

namespace App\Entity;

use App\Repository\RelatedToRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RelatedToRepository::class)
 */
class RelatedTo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Entites::class, inversedBy="ParentOf")
     */
    private $parent;

    /**
     * @ORM\ManyToOne(targetEntity=Entites::class, inversedBy="ChildOf")
     */
    private $child;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParent(): ?Entites
    {
        return $this->parent;
    }

    public function setParent(?Entites $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getChild(): ?Entites
    {
        return $this->child;
    }

    public function setChild(?Entites $child): self
    {
        $this->child = $child;

        return $this;
    }
}
