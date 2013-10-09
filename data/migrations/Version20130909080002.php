<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

class Version20130909080002 extends AbstractMigration
{

    public function up(Schema $schema)
    {
        $sql = <<<SQL
    CREATE TABLE stickynotes (
      id int(11) NOT NULL AUTO_INCREMENT,
      note varchar(255) DEFAULT NULL,
      created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      PRIMARY KEY (id),
      UNIQUE KEY id_UNIQUE (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    INSERT INTO stickynotes (id, note, created)
    VALUES	(1,'This is a sticky note you can type and edit.','2013-08-22 13:18:05');
SQL;
        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
        $sql = "DROP TABLE stickynotes";

        $this->addSql($sql);
    }

}
