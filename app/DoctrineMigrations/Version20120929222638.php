<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20120929222638 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE fos_users (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(120) NOT NULL, location VARCHAR(120) NOT NULL, body LONGTEXT NOT NULL, picture VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE User (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT '(DC2Type:array)', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_2DA1797792FC23A8 (username_canonical), UNIQUE INDEX UNIQ_2DA17977A0D96FBF (email_canonical), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("DROP TABLE Postcard");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE Postcard (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(120) NOT NULL, location VARCHAR(120) NOT NULL, body LONGTEXT NOT NULL, picture VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("DROP TABLE fos_users");
        $this->addSql("DROP TABLE User");
    }
}