<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220616183513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE room_matche (room_id INT NOT NULL, matche_id INT NOT NULL, INDEX IDX_DE8413D154177093 (room_id), INDEX IDX_DE8413D1FD997C2B (matche_id), PRIMARY KEY(room_id, matche_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE room_matche ADD CONSTRAINT FK_DE8413D154177093 FOREIGN KEY (room_id) REFERENCES room (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE room_matche ADD CONSTRAINT FK_DE8413D1FD997C2B FOREIGN KEY (matche_id) REFERENCES matche (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE room_matche');
    }
}
