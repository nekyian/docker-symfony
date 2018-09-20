<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LeagueRepository")
 */
class League
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255, unique=true)
	 */
	private $name;

	/**
	 * @ORM\OneToMany(targetEntity="App\Entity\Team", mappedBy="league")
	 */
	private $teams;

	public function __construct()
	{
		$this->teams = new ArrayCollection();
	}

	/**
	 * @return Collection|Team[]
	 */
	public function getTeams(): Collection
	{
		return $this->teams;
	}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

	public function setName($name)
	{
		$this->name = $name;
	}

}
