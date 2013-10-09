<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20131009150001 extends AbstractMigration
{

    public function up(Schema $schema)
    {
        $sql = <<<SQL
CREATE TABLE phone_inbound_call (
    id int(11) unsigned NOT NULL AUTO_INCREMENT,asterisk_unique_id varchar(16) COLLATE utf8_unicode_ci NOT NULL,
    asterisk_channel_id varchar(64) COLLATE utf8_unicode_ci NOT NULL,
    destination_number int(11) unsigned NOT NULL,
    phone_inbound_call_status_id int(2) NOT NULL,
    dial_plan varchar(64) COLLATE utf8_unicode_ci NOT NULL,
    created_at datetime NOT NULL,
    updated_at datetime,
PRIMARY KEY (id),
KEY phone_inbound_call_status_id (phone_inbound_call_status_id),
CONSTRAINT fk_phone_inbound_call_status_id FOREIGN KEY (phone_inbound_call_status_id) REFERENCES phone_inbound_call_status (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
SQL;
        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
        $schema->dropTable('phone_inbound_call');
    }

}
