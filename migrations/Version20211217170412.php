<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211217170412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE operation (id INT AUTO_INCREMENT NOT NULL, tool_id INT NOT NULL, name VARCHAR(255) NOT NULL, rotational_speed NUMERIC(10, 1) NOT NULL, feed NUMERIC(10, 1) NOT NULL, lead_time INT NOT NULL, INDEX IDX_1981A66D8F7B22CC (tool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tech_set (id INT AUTO_INCREMENT NOT NULL, part_id INT NOT NULL, name VARCHAR(100) NOT NULL, INDEX IDX_39AF81034CE34BEC (part_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tech_set_operation (tech_set_id INT NOT NULL, operation_id INT NOT NULL, INDEX IDX_8092BDDEF66C23 (tech_set_id), INDEX IDX_8092BDDE44AC3583 (operation_id), PRIMARY KEY(tech_set_id, operation_id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D8F7B22CC FOREIGN KEY (tool_id) REFERENCES tool (id)');
        $this->addSql('ALTER TABLE tech_set ADD CONSTRAINT FK_39AF81034CE34BEC FOREIGN KEY (part_id) REFERENCES part (id)');
        $this->addSql('ALTER TABLE tech_set_operation ADD CONSTRAINT FK_8092BDDEF66C23 FOREIGN KEY (tech_set_id) REFERENCES tech_set (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tech_set_operation ADD CONSTRAINT FK_8092BDDE44AC3583 FOREIGN KEY (operation_id) REFERENCES operation (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tech_set_operation DROP FOREIGN KEY FK_8092BDDE44AC3583');
        $this->addSql('ALTER TABLE tech_set DROP FOREIGN KEY FK_39AF81034CE34BEC');
        $this->addSql('ALTER TABLE tech_set_operation DROP FOREIGN KEY FK_8092BDDEF66C23');
        $this->addSql('DROP TABLE operation');
        $this->addSql('DROP TABLE part');
        $this->addSql('DROP TABLE tech_set');
        $this->addSql('DROP TABLE tech_set_operation');
    }
}
