<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220616174650 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_room (user_id INT NOT NULL, room_id INT NOT NULL, INDEX IDX_81E1D52A76ED395 (user_id), INDEX IDX_81E1D5254177093 (room_id), PRIMARY KEY(user_id, room_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_room ADD CONSTRAINT FK_81E1D52A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_room ADD CONSTRAINT FK_81E1D5254177093 FOREIGN KEY (room_id) REFERENCES room (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bet ADD matche_id INT DEFAULT NULL, ADD team_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bet ADD CONSTRAINT FK_FBF0EC9BFD997C2B FOREIGN KEY (matche_id) REFERENCES matche (id)');
        $this->addSql('ALTER TABLE bet ADD CONSTRAINT FK_FBF0EC9B296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_FBF0EC9BFD997C2B ON bet (matche_id)');
        $this->addSql('CREATE INDEX IDX_FBF0EC9B296CD8AE ON bet (team_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_room');
        $this->addSql('ALTER TABLE bet DROP FOREIGN KEY FK_FBF0EC9BFD997C2B');
        $this->addSql('ALTER TABLE bet DROP FOREIGN KEY FK_FBF0EC9B296CD8AE');
        $this->addSql('DROP INDEX IDX_FBF0EC9BFD997C2B ON bet');
        $this->addSql('DROP INDEX IDX_FBF0EC9B296CD8AE ON bet');
        $this->addSql('ALTER TABLE bet DROP matche_id, DROP team_id');
    }
}
