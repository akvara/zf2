<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

class Version20131001160001 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // Insert classifiers
        $sql = <<<SQL
INSERT INTO phone_inbound_call_status (id, name)
VALUES
    (1, 'CALL'),
    (2, 'WAIT'),
    (3, 'HANG');
SQL;
        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
        $this->addSql('TRUNCATE TABLE phone_inbound_call_status;');
    }
}
