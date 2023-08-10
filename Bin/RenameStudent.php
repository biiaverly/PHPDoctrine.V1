<?php

use Src\Domain\Service\StudentService;
require_once __DIR__ . '/../vendor/autoload.php';

echo "Enter the student new name: ";
$handle = fopen("php://stdin", "r");
$newName = fgets($handle);
echo "Enter the student cpf: ";
$cpf = fgets($handle);
fclose($handle);

$service = new StudentService();
$oldname = $service->findByCpf($cpf)->name;
$nome = $service->renameStudent($cpf,$newName);
echo("Student renamed from $oldname to $newName");

