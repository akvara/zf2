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
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  description varchar(255) DEFAULT NULL,
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
