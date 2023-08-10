<?php

declare(strict_types=1);

namespace Src\Infrastructure;

use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\Logging\Middleware;
use Symfony\Component\Console\Output\ConsoleOutput;
use Doctrine\Migrations\Tools\Console\ConsoleLogger;

class EntityManagerCreator
{
    public static function createEntityManager()
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            [__DIR__ . "/.."],
            true
        );

        $consoleOutput = new ConsoleOutput(ConsoleOutput::VERBOSITY_DEBUG);
        $consoleLogger = new ConsoleLogger($consoleOutput);
        $logMiddleware = new Middleware($consoleLogger);
        $config->setMiddlewares([$logMiddleware]);
        
        $connection = [
            'dbname'   => 'Study', // Replace with your actual database name
            'user'     => 'root',     // Replace with your MySQL username
            'password' => 'root',     // Replace with your MySQL password
            'host'     => 'localhost:3301',         // Replace with your MySQL server hostname or IP address
            'driver'   => 'pdo_mysql',
        ];
        return EntityManager::create($connection, $config);
    }
}
