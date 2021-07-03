<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210703101854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE risque (id INT AUTO_INCREMENT NOT NULL, macroprocessus_id INT NOT NULL, processus_id INT DEFAULT NULL, niveau1_id INT NOT NULL, niveau2_id INT NOT NULL, niveau3_id INT NOT NULL, designation VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, impact VARCHAR(255) NOT NULL, frequence VARCHAR(255) NOT NULL, risque_intrinseque VARCHAR(255) NOT NULL, dmr VARCHAR(255) NOT NULL, evaluation_dmr VARCHAR(255) NOT NULL, risque_residuel VARCHAR(255) NOT NULL, INDEX IDX_20230D2490DFA11D (macroprocessus_id), INDEX IDX_20230D24A55629DC (processus_id), INDEX IDX_20230D244CD8A0B9 (niveau1_id), INDEX IDX_20230D245E6D0F57 (niveau2_id), INDEX IDX_20230D24E6D16832 (niveau3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE risque ADD CONSTRAINT FK_20230D2490DFA11D FOREIGN KEY (macroprocessus_id) REFERENCES macroprocessus (id)');
        $this->addSql('ALTER TABLE risque ADD CONSTRAINT FK_20230D24A55629DC FOREIGN KEY (processus_id) REFERENCES processus (id)');
        $this->addSql('ALTER TABLE risque ADD CONSTRAINT FK_20230D244CD8A0B9 FOREIGN KEY (niveau1_id) REFERENCES typo1 (id)');
        $this->addSql('ALTER TABLE risque ADD CONSTRAINT FK_20230D245E6D0F57 FOREIGN KEY (niveau2_id) REFERENCES typo2 (id)');
        $this->addSql('ALTER TABLE risque ADD CONSTRAINT FK_20230D24E6D16832 FOREIGN KEY (niveau3_id) REFERENCES typo3 (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE risque');
    }
}
