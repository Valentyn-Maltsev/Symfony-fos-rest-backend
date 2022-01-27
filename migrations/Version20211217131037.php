<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211217131037 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE element (id INT AUTO_INCREMENT NOT NULL, atomic_number INT NOT NULL, name VARCHAR(100) NOT NULL, alias VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE material (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, composition LONGTEXT NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operation_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tool (id INT AUTO_INCREMENT NOT NULL, tool_type_id INT NOT NULL, material_id INT NOT NULL, name VARCHAR(100) NOT NULL, INDEX IDX_20F33ED1D12881D0 (tool_type_id), INDEX IDX_20F33ED1E308AC6F (material_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tool_type (id INT AUTO_INCREMENT NOT NULL, operation_type_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_579C1762668D0C5E (operation_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tool ADD CONSTRAINT FK_20F33ED1D12881D0 FOREIGN KEY (tool_type_id) REFERENCES tool_type (id)');
        $this->addSql('ALTER TABLE tool ADD CONSTRAINT FK_20F33ED1E308AC6F FOREIGN KEY (material_id) REFERENCES material (id)');
        $this->addSql('ALTER TABLE tool_type ADD CONSTRAINT FK_579C1762668D0C5E FOREIGN KEY (operation_type_id) REFERENCES operation_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tool DROP FOREIGN KEY FK_20F33ED1E308AC6F');
        $this->addSql('ALTER TABLE tool_type DROP FOREIGN KEY FK_579C1762668D0C5E');
        $this->addSql('ALTER TABLE tool DROP FOREIGN KEY FK_20F33ED1D12881D0');
        $this->addSql('DROP TABLE element');
        $this->addSql('DROP TABLE material');
        $this->addSql('DROP TABLE operation_type');
        $this->addSql('DROP TABLE tool');
        $this->addSql('DROP TABLE tool_type');
    }
}
