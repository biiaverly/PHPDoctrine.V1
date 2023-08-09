<?php

declare(strict_types=1);

namespace  Src\Infrastructure\Persistence;

use Src\Infrastructure\Model\Student;
use Src\Infrastructure\EntityManagerCreator;

class StudentRepository
{
    
    public function __construct( public EntityManagerCreator $entityManagerCreator)
    {
        $this->entityManagerCreator = $entityManagerCreator;
    }

    public function insertStudent(Student $student)
    {
        $entityManager= $this->entityManagerCreator->createEntityManager();
        $entityManager->persist($student);
        $entityManager->flush();

        return true;
    }

    /** @var Student[] $listStudents */

    public function listAll()
    {
        $entityManager= $this->entityManagerCreator->createEntityManager();
        $studentRepository = $entityManager->getRepository(Student::class);
        $listStudents = $studentRepository->findAll();
        return  $listStudents;
    }


    public function findId()
    {
        $entityManager= $this->entityManagerCreator->createEntityManager();
        $studentRepository = $entityManager->getRepository(Student::class);
        $listStudents = $studentRepository->find(2);
        return  $listStudents;
    }
}