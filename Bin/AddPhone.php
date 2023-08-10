<?php

use Src\Infrastructure\Model\Student;
use Src\Domain\Service\StudentService;

require_once __DIR__ . '/../vendor/autoload.php';

echo "Enter the student cpf: ";
$handle = fopen("php://stdin", "r");
$cpf = fgets($handle);

echo "Enter the student number: ";
$number = fgets($handle);

fclose($handle);

$service = new StudentService;
$sucess = $service->findByCpf($cpf);
if($sucess==true)
{
    echo ('Already exists a student with this cpf.Would you like to add a phone? [y/n]');
    $handle = fopen("php://stdin", "r");
    $verification = fgets($handle);
    fclose($handle);
    if ($verification == 'y')
    {
        $service->addNumberToStudent($student,$number);
        echo "Phone included";
        return 1;
    }
}else{
    echo ('New student ->');

    echo "Enter the student name: ";
    $handle = fopen("php://stdin", "r");
    $name = fgets($handle);
    fclose($handle);
    $student = new Student($name,$cpf);

    $service->addNumberToStudent($student, $number);
    echo('Phone included');
}




