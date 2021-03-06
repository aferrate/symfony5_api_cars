<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210920111652 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cars (id BIGINT AUTO_INCREMENT NOT NULL, mark VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, description TEXT NOT NULL, slug VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, image_filename VARCHAR(255) DEFAULT NULL, year INT NOT NULL, enabled TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX cars_slug_unique (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cars');
    }
}
