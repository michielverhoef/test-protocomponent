<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use App\Filter\LikeFilter;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * This is an example entity.
 *
 * With an adtional description, all in all its pritty nice [url](www.google.nl)
 *
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}, "enable_max_depth"=true},
 *     denormalizationContext={"groups"={"write"}, "enable_max_depth"=true},
 *     itemOperations={
 *              "get","put","delete",
 *              "audittrail"={
 *                      "method"="GET",
 *                      "name"="Provides an auditrail for this entity",
 *                      "description"="Provides an auditrail for this entity"
 *              }
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\DrankjesRepository")
 * @Gedmo\Loggable
 * @ApiFilter(LikeFilter::class, properties={"name","description"})
 */
class Drankjes
{
    /**
     * @var integer The id of this drink
     *
     * @Groups({"read"})
     * @example 123
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The name of this drink
     *
     * @Groups({"read","write"})
     * @example koffie
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var string The description of this drink
     *
     * @Groups({"read","write"})
     * @example "Een lekker warme drank"  
     * @ORM\Column(type="string", length=255)
     */
    private $description;

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
}
