<?php

namespace App\Entity;

use App\Repository\GroupRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupRepository::class)]
#[ORM\Table(name: '`group`')]
class Group
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $artists = [];

    #[ORM\Column(type: Types::ARRAY)]
    private array $popularSongs = [];

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

    public function getArtists(): array
    {
        return $this->artists;
    }

    public function setArtists(array $artists): static
    {
        $this->artists = $artists;

        return $this;
    }

    public function getPopularSongs(): array
    {
        return $this->popularSongs;
    }

    public function setPopularSongs(array $popularSongs): static
    {
        $this->popularSongs = $popularSongs;

        return $this;
    }
}
