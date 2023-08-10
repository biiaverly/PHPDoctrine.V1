<?php

namespace   Src\Infrastructure\Model;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\GeneratedValue;

#[Entity]
class Phone
{
    #[Id, GeneratedValue, Column]
    public int $id;

    #[ManyToOne(targetEntity: Student::class, inversedBy: "phones")]
    public readonly Student $student;

    public function __construct(
        #[Column]
        public readonly string $number
    ) {
    }

    public function setStudent(Student $student): void
    {
        $this->student = $student;
    }
}