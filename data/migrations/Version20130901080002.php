<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

class Version20130901080002 extends AbstractMigration
{

    public function up(Schema $schema)
    {
        $sql = <<<SQL
CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(255) DEFAULT NULL,
  email varchar(255) DEFAULT NULL,
  password varchar(128) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY username (username),
  UNIQUE KEY email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SQL;
        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
        $schema->dropTable('users');
    }

}
