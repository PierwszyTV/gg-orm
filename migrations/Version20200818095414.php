<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200818095414 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lottery (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lottery_ticket (id INT AUTO_INCREMENT NOT NULL, lottery_id INT DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_9EDCC8D0CFAA77DD (lottery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lottery_ticket ADD CONSTRAINT FK_9EDCC8D0CFAA77DD FOREIGN KEY (lottery_id) REFERENCES lottery (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lottery_ticket DROP FOREIGN KEY FK_9EDCC8D0CFAA77DD');
        $this->addSql('DROP TABLE lottery');
        $this->addSql('DROP TABLE lottery_ticket');
    }
}
