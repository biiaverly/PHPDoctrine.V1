<?php 

use Src\Domain\Service\StudentService;

require_once __DIR__ . '/../vendor/autoload.php';

echo "Student list process started.";

$service = new StudentService;
$service->listStudents();