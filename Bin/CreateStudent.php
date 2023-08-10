<?php

use Src\Infrastructure\Model\Student;
use Src\Domain\Service\StudentService;
use Src\Infrastructure\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';


echo "Enter the student name: ";
$handle = fopen("php://stdin", "r");
$name = fgets($handle);
echo "Enter the student cpf: ";
$cpf = fgets($handle);
fclose($handle);
$entityManager = new EntityManagerCreator;
$entityManager = $entityManager->createEntityManager();
$student = new Student($name,$cpf);
$service = new StudentService;
$sucess = $service->findByCpf($cpf);

if($sucess==true)
{
    echo ('Already exists a student with this cpf. ');
    return 1;
}

$service->newStudent($student);
echo('Student ' . $name . ' included.');




