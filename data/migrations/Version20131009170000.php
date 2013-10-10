<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131009170000 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $sql = <<<SQL
CREATE TABLE task_task_status (
  id tinyint (2) unsigned NOT NULL,
  name varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  description varchar(255),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL;

        $this->addSql($sql);

        $sql = <<<SQL
INSERT INTO task_task_status
  (id, `name`, description)
VALUES
    (10, 'waiting', ''),
    (20, 'progress', ''),
    (30, 'error', ''),
    (40, 'ended', '');
SQL;

        $this->addSql($sql);

    }

    public function down(Schema $schema)
    {
        $this->addSql("DROP TABLE task_task_status;");
    }
}
