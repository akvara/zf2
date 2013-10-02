<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

class Version20130911111111 extends AbstractMigration
{

    public function up(Schema $schema)
    {
        $table = $schema->createTable('test_id_table');
        $table->addColumn('id', 'integer')
            ->setUnsigned(true)
            ->setLength(2)
            ->setAutoincrement(true);
        $table->addColumn('other_id', 'integer')
            ->setUnsigned(true)
            ->setLength(2);
        $table->addColumn('name', 'string')
            ->setLength(8);
        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema)
    {
        $schema->dropTable('test_id_table');
    }

}
