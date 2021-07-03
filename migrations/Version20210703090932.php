<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210703090932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE typo1 (id INT AUTO_INCREMENT NOT NULL, lib_typo1 VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typo2 (id INT AUTO_INCREMENT NOT NULL, typo1_id INT NOT NULL, lib_typo2 VARCHAR(255) NOT NULL, INDEX IDX_A20410BCF51FBB40 (typo1_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typo3 (id INT AUTO_INCREMENT NOT NULL, typo2_id INT NOT NULL, INDEX IDX_D503202AE7AA14AE (typo2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE typo2 ADD CONSTRAINT FK_A20410BCF51FBB40 FOREIGN KEY (typo1_id) REFERENCES typo1 (id)');
        $this->addSql('ALTER TABLE typo3 ADD CONSTRAINT FK_D503202AE7AA14AE FOREIGN KEY (typo2_id) REFERENCES typo2 (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE typo2 DROP FOREIGN KEY FK_A20410BCF51FBB40');
        $this->addSql('ALTER TABLE typo3 DROP FOREIGN KEY FK_D503202AE7AA14AE');
        $this->addSql('DROP TABLE typo1');
        $this->addSql('DROP TABLE typo2');
        $this->addSql('DROP TABLE typo3');
    }
}
