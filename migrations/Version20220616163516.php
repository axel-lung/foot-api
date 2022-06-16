<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220616163516 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE area ADD parent_area_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE area ADD CONSTRAINT FK_D7943D68B5CD52DD FOREIGN KEY (parent_area_id_id) REFERENCES area (id)');
        $this->addSql('CREATE INDEX IDX_D7943D68B5CD52DD ON area (parent_area_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE area DROP FOREIGN KEY FK_D7943D68B5CD52DD');
        $this->addSql('DROP INDEX IDX_D7943D68B5CD52DD ON area');
        $this->addSql('ALTER TABLE area DROP parent_area_id_id');
    }
}
