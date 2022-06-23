<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220620210951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bet DROP FOREIGN KEY FK_FBF0EC9B296CD8AE');
        $this->addSql('DROP INDEX IDX_FBF0EC9B296CD8AE ON bet');
        $this->addSql('ALTER TABLE bet CHANGE team_id teams_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bet ADD CONSTRAINT FK_FBF0EC9BD6365F12 FOREIGN KEY (teams_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_FBF0EC9BD6365F12 ON bet (teams_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bet DROP FOREIGN KEY FK_FBF0EC9BD6365F12');
        $this->addSql('DROP INDEX IDX_FBF0EC9BD6365F12 ON bet');
        $this->addSql('ALTER TABLE bet CHANGE teams_id team_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bet ADD CONSTRAINT FK_FBF0EC9B296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_FBF0EC9B296CD8AE ON bet (team_id)');
    }
}
