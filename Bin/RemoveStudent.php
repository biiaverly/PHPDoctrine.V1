<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Src\Domain\Service\StudentService;

echo "Enter the student CPF: ";
$handle = fopen("php://stdin", "r");
$cpf = fgets($handle);
fclose($handle);

$service = new StudentService();
$sucess = $service->removeStudent($cpf);
if($sucess==false)
{
    echo('The student dont exist.');
    return 1;
}
echo("Student $sucess->name removed");

