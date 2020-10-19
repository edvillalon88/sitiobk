<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201017151604 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE noticia (id INT AUTO_INCREMENT NOT NULL, fechaHora DATETIME DEFAULT NULL, titulo VARCHAR(180) NOT NULL, titulo_en VARCHAR(180) NOT NULL, subtitulo VARCHAR(180) NOT NULL, subtitulo_en VARCHAR(180) NOT NULL, contenido LONGTEXT NOT NULL, contenido_en LONGTEXT NOT NULL, imagen VARCHAR(180) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE galeria (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', proyecto_tipo_id INT DEFAULT NULL, titulo VARCHAR(180) NOT NULL, titulo_en VARCHAR(180) NOT NULL, descripcion LONGTEXT NOT NULL, descripcion_en LONGTEXT NOT NULL, imagen VARCHAR(180) DEFAULT NULL, INDEX IDX_9910D189C7DD0E0C (proyecto_tipo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE galeria ADD CONSTRAINT FK_9910D189C7DD0E0C FOREIGN KEY (proyecto_tipo_id) REFERENCES proyecto_tipo (id)');
        $this->addSql('DROP TABLE nota');
        $this->addSql('ALTER TABLE respuesta ADD empresa VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE encuesta_pregunta ADD orden INT NOT NULL');
        $this->addSql('ALTER TABLE cliente CHANGE imagen imagen VARCHAR(180) DEFAULT NULL');
        $this->addSql('ALTER TABLE proyecto ADD imagen1 VARCHAR(180) DEFAULT NULL, ADD imagen2 VARCHAR(180) DEFAULT NULL, ADD imagen3 VARCHAR(180) DEFAULT NULL');
        $this->addSql('ALTER TABLE renglon CHANGE imagen imagen VARCHAR(180) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE nota (id INT AUTO_INCREMENT NOT NULL, fechaHora DATETIME DEFAULT NULL, titulo VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, titulo_en VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, subtitulo VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, subtitulo_en VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, contenido LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, contenido_en LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, imagen VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE noticia');
        $this->addSql('DROP TABLE galeria');
        $this->addSql('ALTER TABLE cliente CHANGE imagen imagen VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE encuesta_pregunta DROP orden');
        $this->addSql('ALTER TABLE proyecto DROP imagen1, DROP imagen2, DROP imagen3');
        $this->addSql('ALTER TABLE renglon CHANGE imagen imagen VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE respuesta DROP empresa');
    }
}
