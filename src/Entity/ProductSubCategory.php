<?php

namespace App\Entity;

use App\Repository\ProductSubCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProductSubCategoryRepository::class)]
class ProductSubCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'SubCategory name must be at least {{ limit }} characters long',
        maxMessage: 'SubCategory name cannot be longer than {{ limit }} characters',
    )]
    #[Assert\Regex('/^[a-z0-9]+$/',
        message:'SubCategory name must only Contain Letters and Numbers'
    )]
    #[ORM\Column(length: 150)]
    private ?string $name = null;
    #[Assert\Length(
        min: 2,
        max: 150,
        minMessage: 'SubCategory description must be at least {{ limit }} characters long',
        maxMessage: 'SubCategory description cannot be longer than {{ limit }} characters',
    )]
    #[Assert\Regex('/^[a-z0-9]+$/',
        message:'SubCategory description must only Contain Letters and Numbers'
    )]
    #[ORM\Column(length: 150)]
    private ?string $description = null;

    #[ORM\Column(length: 150)]
    private ?string $picture = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\ManyToOne(inversedBy: 'subCategories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ProductCategory $category = null;

    #[ORM\OneToMany(targetEntity: Product::class, mappedBy: 'subcategory', orphanRemoval: true)]
    private Collection $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
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

    public function getCategory(): ?ProductCategory
    {
        return $this->category;
    }

    public function setCategory(?ProductCategory $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): static
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setSubcategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): static
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getSubcategory() === $this) {
                $product->setSubcategory(null);
            }
        }

        return $this;
    }
    public function __toString() : string
    {
        return $this->name;
    }
}
