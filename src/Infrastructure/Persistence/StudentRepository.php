<?php

declare(strict_types=1);

namespace  Src\Infrastructure\Persistence;

use Src\Infrastructure\Model\Student;
use Src\Infrastructure\EntityManagerCreator;

class StudentRepository
{
    public $entityManager;

    public function __construct()
    {   $entityManagerCreator = new EntityManagerCreator;
        $this->entityManager = $entityManagerCreator->createEntityManager();
    }

    public function insertStudent(Student $student)
    {
        $this->entityManager->persist($student);
        $this->entityManager->flush();

        return true;
    }

    /** @var Student[] $listStudents */

    public function listAll()
    {
        $studentRepository = $this->entityManager->getRepository(Student::class);
        $listStudents = $studentRepository->findAll();
        return  $listStudents;
    }


    public function findById(int $id)
    {
        $studentRepository = $this->entityManager->getRepository(Student::class);
        $listStudents = $studentRepository->find($id);
        return  $listStudents;
    }

    public function findIdByCpf(string $cpf)
    {
 
        $studentRepository = $this->entityManager->getRepository(Student::class);
        $student = $studentRepository->findBy([
            'cpf' => $cpf
        ]);
        if(count($student)>0)
        {

            return $student[0];
        }

        return false;
    }

    public function remove(string $cpf)
    {
        $id = $this->findIdByCpf($cpf);
        if($id == false)
        {
            return false;;
        }
        $student = $this->entityManager->getPartialReference(Student::class,$id);
        $this->entityManager->remove($student);
        $this->entityManager->flush();

        return true;
    }

    public function rename(string $cpf, string $newName)
    {
        $id = $this->findIdByCpf($cpf)->id;
        if($id == false)
        {
            return false;;
        }
        $student = $this->entityManager->find(Student::class,$id);
        $student->name = $newName;
        $this->entityManager->flush();

        return $student;
    }

}