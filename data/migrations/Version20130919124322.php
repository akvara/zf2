<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Create user entity table
 */
class Version20130919124322 extends AbstractMigration
{

    public function up(Schema $schema)
    {
        $query = <<<SQL
CREATE TABLE `auth_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
SQL;

        $this->addSql($query);
    }

    public function down(Schema $schema)
    {
        $query = <<<SQL
DROP TABLE IF EXISTS `auth_user`;
SQL;

        $this->addSql($query);
    }
}
