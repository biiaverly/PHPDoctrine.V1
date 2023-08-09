<?php

declare(strict_types=1);

namespace  Src\Infrastructure\Model;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;

#[Entity]
class Student
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    public int $id;

    public function __construct(
        #[Column]
        public readonly string $name
    ) {
    }
}