<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

class Version20130901080002 extends AbstractMigration
{

    public function up(Schema $schema)
    {
        $sql = <<<SQL
CREATE TABLE uploads (
  id int(11) NOT NULL AUTO_INCREMENT,
  filename varchar(255) NOT NULL,
  label varchar(255) NOT NULL,
  user_id int(11) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY filename (filename)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL;
        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
        $schema->dropTable('uploads');
    }

}
