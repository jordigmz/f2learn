<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220211113141 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE courses ADD language INT DEFAULT NULL, ADD instructor INT DEFAULT NULL, ADD level INT DEFAULT NULL, ADD assessments INT DEFAULT NULL');
        $this->addSql('ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4CD4DB71B5 FOREIGN KEY (language) REFERENCES languages (id)');
        $this->addSql('ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4C31FC43DD FOREIGN KEY (instructor) REFERENCES users (id)');
        $this->addSql('ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4C9AEACC13 FOREIGN KEY (level) REFERENCES levels (id)');
        $this->addSql('ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4C4BFCEC0A FOREIGN KEY (assessments) REFERENCES assessments (id)');
        $this->addSql('CREATE INDEX IDX_A9A55A4CD4DB71B5 ON courses (language)');
        $this->addSql('CREATE INDEX IDX_A9A55A4C31FC43DD ON courses (instructor)');
        $this->addSql('CREATE INDEX IDX_A9A55A4C9AEACC13 ON courses (level)');
        $this->addSql('CREATE INDEX IDX_A9A55A4C4BFCEC0A ON courses (assessments)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articulos CHANGE nombre nombre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE imagen imagen VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE descripcion descripcion VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE assessments CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE blog CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE title title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE description description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE categories CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE contact CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE phone phone VARCHAR(40) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE subject subject VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE message message TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4CD4DB71B5');
        $this->addSql('ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4C31FC43DD');
        $this->addSql('ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4C9AEACC13');
        $this->addSql('ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4C4BFCEC0A');
        $this->addSql('DROP INDEX IDX_A9A55A4CD4DB71B5 ON courses');
        $this->addSql('DROP INDEX IDX_A9A55A4C31FC43DD ON courses');
        $this->addSql('DROP INDEX IDX_A9A55A4C9AEACC13 ON courses');
        $this->addSql('DROP INDEX IDX_A9A55A4C4BFCEC0A ON courses');
        $this->addSql('ALTER TABLE courses DROP language, DROP instructor, DROP level, DROP assessments, CHANGE title title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE description description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE duration duration VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE images CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE description description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE languages CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE levels CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE partners CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE logo logo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_spanish_ci`, CHANGE description description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_spanish_ci`');
        $this->addSql('ALTER TABLE users CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8_spanish_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8_spanish_ci`, CHANGE image image VARCHAR(255) NOT NULL COLLATE `utf8_spanish_ci`, CHANGE username username VARCHAR(255) NOT NULL COLLATE `utf8_spanish_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8_spanish_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8_spanish_ci` COMMENT \'(DC2Type:json)\'');
    }
}
