<?php

namespace  Src\Infrastructure\bin;

use Src\Infrastructure\EntityManagerCreator;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

require_once __DIR__ . '/../../../vendor/autoload.php';


$entityManager = EntityManagerCreator::createEntityManager();
ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);