<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20131009150000 extends AbstractMigration
{

    public function up(Schema $schema)
    {
        $sql = <<<SQL
CREATE TABLE phone_inbound_call_status (
  id int (2) NOT NULL,
  name varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  description varchar(255),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO phone_inbound_call_status (id, name, description)
VALUES
  (10, 'call',''),
  (20, 'wait',''),
  (30, 'error',''),
  (40, 'hang','');
SQL;

        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
        $this->addSql("DROP TABLE phone_inbound_call_status");

    }

}
