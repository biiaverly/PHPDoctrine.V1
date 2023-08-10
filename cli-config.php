<?php
use Doctrine\Migrations\DependencyFactory;
use Src\Infrastructure\EntityManagerCreator;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;

// replace with file to your own project bootstrap
require_once 'vendor/autoload.php';

$config = new PhpFile(__DIR__ . '/migrations.php');

$entityManager = EntityManagerCreator::createEntityManager();

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));