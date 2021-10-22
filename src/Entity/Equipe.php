<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=EquipeRepository::class)
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks()
 */
class Equipe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * 
     * @Vich\UploadableField(mapping="logo_equipe_world", fileNameProperty="logo")
     * 
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\ManyToOne(targetEntity=Group::class, inversedBy="equipes")
     */
    private $groupe;

    /**
     * @ORM\OneToMany(targetEntity=Game::class, mappedBy="equipe1")
     */
    private $gamesEquipe1;

    /**
     * @ORM\OneToMany(targetEntity=Game::class, mappedBy="equipe2")
     */
    private $gamesEquipe2;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updatedAt;

    public function __construct()
    {
        $this->gamesEquipe1 = new ArrayCollection();
        $this->gamesEquipe2 = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        // if (null !== $imageFile) {
        //     // It is required that at least one field changes if you are using doctrine
        //     // otherwise the event listeners won't be called and the file is lost
        //     $this->updatedAt = new \DateTimeImmutable();
        // }
    }

    public function getGroupe(): ?Group
    {
        return $this->groupe;
    }

    public function setGroupe(?Group $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    /**
     * @return Collection|Game[]
     */
    public function getGamesEquipe1(): Collection
    {
        return $this->gamesEquipe1;
    }

    public function addGamesEquipe1(Game $gamesEquipe1): self
    {
        if (!$this->gamesEquipe1->contains($gamesEquipe1)) {
            $this->gamesEquipe1[] = $gamesEquipe1;
            $gamesEquipe1->setEquipe1($this);
        }

        return $this;
    }

    public function removeGamesEquipe1(Game $gamesEquipe1): self
    {
        if ($this->gamesEquipe1->removeElement($gamesEquipe1)) {
            // set the owning side to null (unless already changed)
            if ($gamesEquipe1->getEquipe1() === $this) {
                $gamesEquipe1->setEquipe1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Game[]
     */
    public function getGamesEquipe2(): Collection
    {
        return $this->gamesEquipe2;
    }

    public function addGamesEquipe2(Game $gamesEquipe2): self
    {
        if (!$this->gamesEquipe2->contains($gamesEquipe2)) {
            $this->gamesEquipe2[] = $gamesEquipe2;
            $gamesEquipe2->setEquipe2($this);
        }

        return $this;
    }

    public function removeGamesEquipe2(Game $gamesEquipe2): self
    {
        if ($this->gamesEquipe2->removeElement($gamesEquipe2)) {
            // set the owning side to null (unless already changed)
            if ($gamesEquipe2->getEquipe2() === $this) {
                $gamesEquipe2->setEquipe2(null);
            }
        }

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updateTimesStamps():void
    {
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new \DateTimeImmutable());
        }

        $this->updatedAt = new \DateTimeImmutable();
    }
}
