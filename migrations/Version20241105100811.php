<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241105100811 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE medecin (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medecin_sepcialite (medecin_id INT NOT NULL, sepcialite_id INT NOT NULL, INDEX IDX_ED56096A4F31A84 (medecin_id), INDEX IDX_ED56096A6A8F1295 (sepcialite_id), PRIMARY KEY(medecin_id, sepcialite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE medecin_sepcialite ADD CONSTRAINT FK_ED56096A4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medecin_sepcialite ADD CONSTRAINT FK_ED56096A6A8F1295 FOREIGN KEY (sepcialite_id) REFERENCES specialite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD medecin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6494F31A84 ON user (medecin_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494F31A84');
        $this->addSql('ALTER TABLE medecin_sepcialite DROP FOREIGN KEY FK_ED56096A4F31A84');
        $this->addSql('ALTER TABLE medecin_sepcialite DROP FOREIGN KEY FK_ED56096A6A8F1295');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE medecin_sepcialite');
        $this->addSql('DROP TABLE specialite');
        $this->addSql('DROP INDEX IDX_8D93D6494F31A84 ON user');
        $this->addSql('ALTER TABLE user DROP medecin_id');
    }
}
