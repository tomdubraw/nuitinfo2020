<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity=Organization::class, inversedBy="user", cascade={"persist", "remove"})
     */
    private $organization;

    /**
     * @ORM\OneToOne(targetEntity=Watterman::class, inversedBy="user", cascade={"persist", "remove"})
     */
    private $waterman;

    /**
     * @ORM\OneToMany(targetEntity=FavCity::class, mappedBy="user")
     */
    private $favCities;

    public function __construct()
    {
        $this->favCities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getOrganization(): ?Organization
    {
        return $this->organization;
    }

    public function setOrganization(?Organization $organization): self
    {
        $this->organization = $organization;

        return $this;
    }

    public function getWaterman(): ?Watterman
    {
        return $this->waterman;
    }

    public function setWaterman(?Watterman $waterman): self
    {
        $this->waterman = $waterman;

        return $this;
    }

    /**
     * @return Collection|FavCity[]
     */
    public function getFavCities(): Collection
    {
        return $this->favCities;
    }

    public function addFavCity(FavCity $favCity): self
    {
        if (!$this->favCities->contains($favCity)) {
            $this->favCities[] = $favCity;
            $favCity->setUser($this);
        }

        return $this;
    }

    public function removeFavCity(FavCity $favCity): self
    {
        if ($this->favCities->removeElement($favCity)) {
            // set the owning side to null (unless already changed)
            if ($favCity->getUser() === $this) {
                $favCity->setUser(null);
            }
        }

        return $this;
    }
}
