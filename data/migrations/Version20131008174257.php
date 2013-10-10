<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20131008174257 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("
            CREATE TABLE phone_outbound_call (
                id INT(11) AUTO_INCREMENT NOT NULL,
                phone_outbound_call_status_id INT(11) DEFAULT NULL,
                destination_number VARCHAR(15) NOT NULL,
                created_at DATETIME NOT NULL,
                updated_at DATETIME DEFAULT NULL,
                INDEX idx_phone_outbound_call_status_id (phone_outbound_call_status_id),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");

        $this->addSql("
            CREATE TABLE phone_outbound_call_status (
                id INT(11) AUTO_INCREMENT NOT NULL,
                name VARCHAR(8) NOT NULL,
                description VARCHAR(255) DEFAULT NULL,
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");


        $this->addSql("
            INSERT INTO `phone_outbound_call_status` (`id`, `name`)
            VALUES (10, 'new'), (20, 'progress'), (30, 'error'), (40, 'ended') ;");

        $this->addSql("
            ALTER TABLE phone_outbound_call
            ADD CONSTRAINT fk_phone_outbound_call_status__phone_outbound_call_status_id
            FOREIGN KEY (phone_outbound_call_status_id) REFERENCES phone_outbound_call_status (id)");
    }

    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("DROP TABLE phone_outbound_call");
        $this->addSql("DROP TABLE phone_outbound_call_status");
    }
}
