<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

class Version20131001160000 extends AbstractMigration
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

LOCK TABLES user WRITE;
/*!40000 ALTER TABLE user DISABLE KEYS */;

INSERT INTO user (user_id, username, email, display_name, password, state, rememberme)
VALUES
	(3,'kristina','kristina@zinojimas.lt',NULL,'983affbaaaf6527ccf0d1ba83d21ff88',NULL,NULL),
	(12,'akvara','akvara@gmail.com',NULL,'d38787337899fba4b7fc3653c81ab844',NULL,NULL);
SQL;
        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
        $this->addSql("DROP TABLE user");

    }

}
