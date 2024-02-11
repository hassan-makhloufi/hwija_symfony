<?php

namespace App\Entity;

use App\Repository\ProductCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProductCategoryRepository::class)]
class ProductCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Category name must be at least {{ limit }} characters long',
        maxMessage: 'Category name cannot be longer than {{ limit }} characters',
    )]
    #[Assert\Regex('/^[a-z0-9]+$/',
        message:'Category name must only Contain Letters and Numbers'
    )]
    #[ORM\Column(length: 150)]
    private ?string $name = null;
    #[Assert\NotNull()]
    #[Assert\Length(
        min: 2,
        max: 150,
        minMessage: 'Category description must be at least {{ limit }} characters long',
        maxMessage: 'Category description cannot be longer than {{ limit }} characters',
    )]
    #[Assert\Regex('/^[a-z0-9]+$/',
        message:'Category description must only Contain Letters and Numbers'
    )]
    #[ORM\Column(length: 150)]
    private ?string $description = null;

    #[ORM\Column(length: 150)]
    private ?string $picture = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\OneToMany(targetEntity: ProductSubCategory::class, mappedBy: 'category', orphanRemoval: true)]
    private Collection $subCategories;

    public function __construct()
    {
        $this->subCategories = new ArrayCollection();
    }

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return Collection<int, ProductSubCategory>
     */
    public function getSubCategories(): Collection
    {
        return $this->subCategories;
    }

    public function addSubCategory(ProductSubCategory $subCategory): static
    {
        if (!$this->subCategories->contains($subCategory)) {
            $this->subCategories->add($subCategory);
            $subCategory->setCategory($this);
        }

        return $this;
    }

    public function removeSubCategory(ProductSubCategory $subCategory): static
    {
        if ($this->subCategories->removeElement($subCategory)) {
            // set the owning side to null (unless already changed)
            if ($subCategory->getCategory() === $this) {
                $subCategory->setCategory(null);
            }
        }

        return $this;
    }
    public function __toString() : string
    {
        return $this->name;
    }
}
