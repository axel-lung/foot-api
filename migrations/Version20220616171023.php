<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220616171023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competition (id INT AUTO_INCREMENT NOT NULL, area_id INT DEFAULT NULL, season_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, code VARCHAR(3) DEFAULT NULL, type VARCHAR(10) DEFAULT NULL, emblem VARCHAR(255) DEFAULT NULL, plan VARCHAR(10) DEFAULT NULL, INDEX IDX_B50A2CB1BD0F409C (area_id), INDEX IDX_B50A2CB14EC001D1 (season_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, start_date DATE DEFAULT NULL, end_date DATE DEFAULT NULL, matchday INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB1BD0F409C FOREIGN KEY (area_id) REFERENCES area (id)');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB14EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB14EC001D1');
        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE season');
    }
}
