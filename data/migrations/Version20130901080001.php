<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

class Version20130901080001 extends AbstractMigration
{

    public function up(Schema $schema)
    {
        $sql = <<<SQL
CREATE TABLE user (
  user_id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(255) DEFAULT NULL,
  email varchar(255) DEFAULT NULL,
  display_name varchar(50) DEFAULT NULL,
  password varchar(128) NOT NULL,
  state smallint(6) DEFAULT NULL,
  rememberme tinyint(1) DEFAULT NULL,
  PRIMARY KEY (user_id),
  UNIQUE KEY username (username),
  UNIQUE KEY email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SQL;
        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
        $schema->dropTable('user');
    }

}
