<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220212092659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users ADD is_verified TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articulos CHANGE nombre nombre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE imagen imagen VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE descripcion descripcion VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE assessments CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE blog CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE title title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE description description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE categories CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE contact CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE phone phone VARCHAR(40) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE subject subject VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE message message TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE courses CHANGE title title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE description description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE duration duration VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE images CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE description description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE languages CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE levels CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE partners CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE logo logo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE description description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE users DROP is_verified, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8_spanish_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8_spanish_ci`, CHANGE image image VARCHAR(255) NOT NULL COLLATE `utf8_spanish_ci`, CHANGE username username VARCHAR(255) NOT NULL COLLATE `utf8_spanish_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8_spanish_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8_spanish_ci` COMMENT \'(DC2Type:json)\'');
    }
}
