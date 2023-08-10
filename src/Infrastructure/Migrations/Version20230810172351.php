<?php

namespace  Src\Infrastructure\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230810172351 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        //// ----- WAY 1------///
        // $this->addSql('
        // CREATE TABLE teste
        // (
        //     id INTEGER PRIMARY KEY,
        //     coluna_test VARCHAR(255),
        //     primary key(id)
        // );'
        // );

        //// ----- WAY 2------///

        $table = $schema->createTable('test');
        $table->addColumn('id', 'integer')
            ->setAutoincrement(true);
        $table->addColumn('test_column', 'string');

        $table->setPrimaryKey(['id']);

    }

    public function down(Schema $schema): void
    {
        // $this->addSql('DROP TABLE teste;');
        $schema->dropTable('teste');

    }
}
