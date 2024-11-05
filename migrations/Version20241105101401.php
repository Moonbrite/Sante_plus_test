<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241105101401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sepcialite_user (sepcialite_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_1B71A5476A8F1295 (sepcialite_id), INDEX IDX_1B71A547A76ED395 (user_id), PRIMARY KEY(sepcialite_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sepcialite_user ADD CONSTRAINT FK_1B71A5476A8F1295 FOREIGN KEY (sepcialite_id) REFERENCES specialite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sepcialite_user ADD CONSTRAINT FK_1B71A547A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medecin_sepcialite DROP FOREIGN KEY FK_ED56096A4F31A84');
        $this->addSql('ALTER TABLE medecin_sepcialite DROP FOREIGN KEY FK_ED56096A6A8F1295');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE medecin_sepcialite');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE medecin (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE medecin_sepcialite (medecin_id INT NOT NULL, sepcialite_id INT NOT NULL, INDEX IDX_ED56096A4F31A84 (medecin_id), INDEX IDX_ED56096A6A8F1295 (sepcialite_id), PRIMARY KEY(medecin_id, sepcialite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE medecin_sepcialite ADD CONSTRAINT FK_ED56096A4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medecin_sepcialite ADD CONSTRAINT FK_ED56096A6A8F1295 FOREIGN KEY (sepcialite_id) REFERENCES specialite (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sepcialite_user DROP FOREIGN KEY FK_1B71A5476A8F1295');
        $this->addSql('ALTER TABLE sepcialite_user DROP FOREIGN KEY FK_1B71A547A76ED395');
        $this->addSql('DROP TABLE sepcialite_user');
    }
}
