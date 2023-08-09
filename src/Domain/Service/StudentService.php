<?php

declare(strict_types=1);

namespace  Src\Domain\Service;

use Src\Infrastructure\Model\Student;
use Src\Infrastructure\EntityManagerCreator;
use Src\Infrastructure\Persistence\StudentRepository;

class StudentService
{

    public function __construct(public StudentRepository $doctrineRepository)
    {
        $this->doctrineRepository = $doctrineRepository;
    }

    public function newStudent(Student $student)
    {
        $doctrineRepository = new StudentRepository(new EntityManagerCreator);
        $doctrineRepository->insertStudent($student);

        return true;
    }

    public function listStudents()
    {
        $doctrineRepository = new StudentRepository(new EntityManagerCreator);
        $list = $doctrineRepository->listAll();
        foreach ($list as $student)
        {
            echo "ID: $student->id \n Nome: $student->name \n";
        }
    }

    public function findId()
    {
        $doctrineRepository = new StudentRepository(new EntityManagerCreator);
        $student = $doctrineRepository->findId(2);
        return $student;
    }
    
}