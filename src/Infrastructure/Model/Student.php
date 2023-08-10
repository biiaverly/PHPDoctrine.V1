<?php

declare(strict_types=1);

namespace  Src\Infrastructure\Model;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[Entity]
class Student
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    public int $id;

    #[OneToMany(
        mappedBy: "student",
        targetEntity: Phone::class,
        cascade: ["persist", "remove"]
    )]
    private Collection $phones;
    

    public function __construct(
        #[Column]
        public  string $name,
        #[Column]
        public readonly string $cpf
    ) 
    {
        $this->phones = new ArrayCollection();

    }

        /**
     * @return Collection<Phone>
     */
    public function phones(): Collection
    {
        return $this->phones;
    }

    public function addPhone(Phone $phone)
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }

}