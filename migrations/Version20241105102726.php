<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241105102726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medecin ADD sepcialite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C66A8F1295 FOREIGN KEY (sepcialite_id) REFERENCES specialite (id)');
        $this->addSql('CREATE INDEX IDX_1BDA53C66A8F1295 ON medecin (sepcialite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C66A8F1295');
        $this->addSql('DROP INDEX IDX_1BDA53C66A8F1295 ON medecin');
        $this->addSql('ALTER TABLE medecin DROP sepcialite_id');
    }
}
