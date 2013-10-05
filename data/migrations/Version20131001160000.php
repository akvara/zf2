<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

class Version20131001160000 extends AbstractMigration
{

    public function up(Schema $schema)
    {
        $sql = <<<SQL
CREATE TABLE album (
  id int(11) NOT NULL AUTO_INCREMENT,
  artist varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  title varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `album` (`id`, `artist`, `title`)
VALUES
	(1,'The  Military  Wives','In  My  Dreams7'),
	(2,'Adele','21'),
	(3,'Bruce  Springsteen','Wrecking Ball (Deluxe)'),
	(4,'Lana  Del  Rey','Born  To  Die'),
	(5,'Gotye','Making  Mirrors'),
	(6,'Albumas','Naujas'),
	(7,'David Bowie','The Next Day (Deluxe Version)'),
	(8,'Bastille','Bad Blood'),
	(9,'Bruno Mars','Unorthodox Jukebox'),
	(10,'Emeli Sandé','Our Version of Events (Special Edition)'),
	(11,'Bon Jovi','What About Now (Deluxe Version)'),
	(12,'Justin Timberlake','The 20/20 Experience (Deluxe Version)'),
	(13,'Bastille','Bad Blood (The Extended Cut)'),
	(14,'P!nk','The Truth About Love'),
	(15,'Sound City - Real to Reel','Sound City - Real to Reel'),
	(16,'Jake Bugg','Jake Bugg'),
	(17,'Various Artists','The Trevor Nelson Collection'),
	(18,'David Bowie','The Next Day'),
	(19,'Mumford & Sons','Babel'),
	(20,'The Lumineers','The Lumineers'),
	(21,'Various Artists','Get Ur Freak On - R&B Anthems'),
	(22,'The 1975','Music For Cars EP'),
	(23,'Various Artists','Saturday Night Club Classics - Ministry of Sound'),
	(24,'Hurts','Exile (Deluxe)'),
	(25,'Various Artists','Mixmag - The Greatest Dance Tracks of All Time'),
	(26,'Ben Howard','Every Kingdom'),
	(27,'Stereophonics','Graffiti On the Train'),
	(28,'The Script','#3'),
	(29,'Stornoway','Tales from Terra Firma');

SQL;
        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
        $this->addSql("DROP TABLE album");

    }

}
