<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220616173929 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE matche (id INT AUTO_INCREMENT NOT NULL, area_id INT DEFAULT NULL, competition_id INT DEFAULT NULL, home_team_id INT DEFAULT NULL, away_team_id INT DEFAULT NULL, winner_team_id INT DEFAULT NULL, `utc_date` DATETIME DEFAULT NULL, status VARCHAR(9) DEFAULT NULL, matchday INT DEFAULT NULL, stage VARCHAR(21) DEFAULT NULL, duration VARCHAR(255) DEFAULT NULL, home_score INT DEFAULT NULL, away_score INT DEFAULT NULL, groupe VARCHAR(7) DEFAULT NULL, INDEX IDX_9FCAD510BD0F409C (area_id), INDEX IDX_9FCAD5107B39D312 (competition_id), INDEX IDX_9FCAD5109C4C13F6 (home_team_id), INDEX IDX_9FCAD51045185D02 (away_team_id), INDEX IDX_9FCAD510C5237001 (winner_team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, short_name VARCHAR(255) DEFAULT NULL, tla VARCHAR(3) DEFAULT NULL, crest VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE matche ADD CONSTRAINT FK_9FCAD510BD0F409C FOREIGN KEY (area_id) REFERENCES area (id)');
        $this->addSql('ALTER TABLE matche ADD CONSTRAINT FK_9FCAD5107B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('ALTER TABLE matche ADD CONSTRAINT FK_9FCAD5109C4C13F6 FOREIGN KEY (home_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE matche ADD CONSTRAINT FK_9FCAD51045185D02 FOREIGN KEY (away_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE matche ADD CONSTRAINT FK_9FCAD510C5237001 FOREIGN KEY (winner_team_id) REFERENCES team (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matche DROP FOREIGN KEY FK_9FCAD5109C4C13F6');
        $this->addSql('ALTER TABLE matche DROP FOREIGN KEY FK_9FCAD51045185D02');
        $this->addSql('ALTER TABLE matche DROP FOREIGN KEY FK_9FCAD510C5237001');
        $this->addSql('DROP TABLE matche');
        $this->addSql('DROP TABLE team');
    }
}
