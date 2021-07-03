<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210703085506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE processus (id INT AUTO_INCREMENT NOT NULL, macroprocessus_id INT NOT NULL, lib_p VARCHAR(255) NOT NULL, INDEX IDX_EEEA8C1D90DFA11D (macroprocessus_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE processus ADD CONSTRAINT FK_EEEA8C1D90DFA11D FOREIGN KEY (macroprocessus_id) REFERENCES macroprocessus (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE processus');
    }
}
