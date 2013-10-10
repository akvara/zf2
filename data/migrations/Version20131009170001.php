<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131009170001 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $sql = <<<SQL
CREATE TABLE task_task (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  resource_id int(11) NOT NULL,
  resource_table varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  created_at datetime NOT NULL,
  updated_at datetime DEFAULT NULL,
  auth_user_id int(11) unsigned DEFAULT NULL,
  task_task_status_id tinyint(2) unsigned NOT NULL,
PRIMARY KEY (id),

KEY auth_user_id (auth_user_id),
CONSTRAINT fk_auth_user__auth_user_id
  FOREIGN KEY (auth_user_id) REFERENCES auth_user (id)
    ON DELETE SET NULL
    ON UPDATE CASCADE,

KEY task_task_status_id (task_task_status_id),
CONSTRAINT fk_task_task_status__task_task_status_id
  FOREIGN KEY (task_task_status_id) REFERENCES task_task_status (id)
    ON UPDATE CASCADE


) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
SQL;

        $this->addSql($sql);

    }

    public function down(Schema $schema)
    {
        $this->addSql('DROP TABLE IF EXISTS task_task;');
    }
}
