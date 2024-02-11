<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[Assert\NotNull]
    #[ORM\Column(length: 150)]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Product name must be at least {{ limit }} characters long',
        maxMessage: 'Product name cannot be longer than {{ limit }} characters',
    )]
    #[Assert\Regex('/^[a-z0-9]+$/',
        message:'Product name must only Contain Letters and Numbers'
    )]
    private ?string $name = null;
    #[Assert\NotNull]
    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;
    #[Assert\NotNull]
    #[Assert\Length(
        min: 2,
        max: 150,
        minMessage: 'Product description must be at least {{ limit }} characters long',
        maxMessage: 'Product description cannot be longer than {{ limit }} characters',
    )]
    #[Assert\Regex('/^[a-z0-9]+$/',
        message:'Product description must only Contain Letters and Numbers'
    )]
    #[ORM\Column(length: 150)]
    private ?string $description = null;
    #[ORM\Column(length: 150)]
    private ?string $picture = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ProductSubCategory $subcategory = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;
    #[Assert\GreaterThan(0,message:'Product quantity should be greater atleast 1')]
    #[ORM\Column]
    private ?int $quantity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function getSubcategory(): ?ProductSubCategory
    {
        return $this->subcategory;
    }

    public function setSubcategory(?ProductSubCategory $subcategory): static
    {
        $this->subcategory = $subcategory;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }
    public function __toString() : string
    {
        return $this->name;
    }
}
