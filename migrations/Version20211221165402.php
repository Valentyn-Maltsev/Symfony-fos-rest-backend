<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211221165402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE tech_set_operation');
        $this->addSql('ALTER TABLE operation ADD tech_set_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66DF66C23 FOREIGN KEY (tech_set_id) REFERENCES tech_set (id)');
        $this->addSql('CREATE INDEX IDX_1981A66DF66C23 ON operation (tech_set_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tech_set_operation (tech_set_id INT NOT NULL, operation_id INT NOT NULL, INDEX IDX_8092BDDE44AC3583 (operation_id), INDEX IDX_8092BDDEF66C23 (tech_set_id), PRIMARY KEY(tech_set_id, operation_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE tech_set_operation ADD CONSTRAINT FK_8092BDDE44AC3583 FOREIGN KEY (operation_id) REFERENCES operation (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tech_set_operation ADD CONSTRAINT FK_8092BDDEF66C23 FOREIGN KEY (tech_set_id) REFERENCES tech_set (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66DF66C23');
        $this->addSql('DROP INDEX IDX_1981A66DF66C23 ON operation');
        $this->addSql('ALTER TABLE operation DROP tech_set_id');
    }
}
